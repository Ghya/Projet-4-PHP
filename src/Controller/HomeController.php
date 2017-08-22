<?php

namespace ProjetPHP\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use ProjetPHP\Domain\Comment;
use ProjetPHP\Domain\User;
use ProjetPHP\Form\Type\UserType;
use ProjetPHP\Form\Type\CommentType;

class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function homeAction(Application $app) {

        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->boardAction($app);
        }

        return $app['twig']->render('landing.html.twig');
    }

    /**
     * Board page controller.
     *
     * @param Application $app Silex application
     */
    public function boardAction(Application $app) {
        $chapters = $app['dao.chapter']->findAll();
        $lastChapter = $app['dao.chapter']->findLast();

        if (isset($_COOKIE['marker'])){
            return $app['twig']->render('board2.html.twig', array(
                'chapters' => $chapters,                
                'marker' => $_COOKIE['marker'],
                'page' => $_COOKIE['page'],
                'lastChapter' => $lastChapter
            ));
        }
        else {
            return $app['twig']->render('board2.html.twig', array(
                'chapters' => $chapters,                
                'marker' => ""
            ));
        }
    }

    /**
     * Chapter page controller.
     *
     * @param Application $app Silex application
     */

    public function chapterAction($id, Request $request, Application $app) {

        $chapter = $app['dao.chapter']->find($id);
        $lastChapter = $app['dao.chapter']->findLast();
        $chapterDecode = htmlspecialchars_decode($chapter->getContent());
        $chapter->setContent($chapterDecode);
        $pages = $app['pageMaker']->createPage($chapter->getContent());
        $commentFormView = null;

        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            // A user is fully authenticated : he can add comments
            $comment = new Comment();
            $comment->setChapter($chapter);
            $user = $app['user'];
            $comment->setUser($user);
            $commentForm = $app['form.factory']->create(CommentType::class, $comment);
            $commentForm->handleRequest($request);

            if ($commentForm->isSubmitted() && $commentForm->isValid()) {
                $app['dao.comment']->save($comment);
                $app['session']->getFlashBag()->add('success', 'Votre commentaire a été ajouté');
            }
            $commentFormView = $commentForm->createView();

            if (isset($_COOKIE['marker'])) {
                $app['session']->getFlashBag()->add('marked', 'La page à bien été marquée');
            }
        }

        $comments = $app['dao.comment']->findAllByChapter($id);
        return $app['twig']->render('chapter2.html.twig', 
            array(
                'chapter' => $chapter,
                'pages' => $pages, 
                'comments' => $comments, 
                'commentForm' => $commentFormView,
                'lastChapter' => $lastChapter,
                'marker' => $_COOKIE['marker']
            ));

    }

    /**
     * page marker controller.
     * 
     * @param Application $app Silex application
     */
        public function markerAction($id, Request $request, Application $app) {

            setcookie( 'marker' , $id, time() + 365*24*3600, '/', null, false, false); 

            return $app->redirect($app['url_generator']->generate('chapter', ['id'=>$id]));
        }

    /**
     * Log user controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app) {

        return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    /**
     * Sign up controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function signinAction(Request $request, Application $app) {
        $user = new User();
        $user->setRole('ROLE_USER');
        $userForm = $app['form.factory']->create(UserType::class, $user);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // generate a random salt value
            $salt = substr(md5(time()), 0, 23);
            $user->setSalt($salt);
            $plainPassword = $user->getPassword();
            // find the default encoder
            $encoder = $app['security.encoder.bcrypt'];
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);

            return $app->redirect($app['url_generator']->generate('login', array(
                'username' => $user->getUsername(),
                'password' => $user->getPassword()
            )));

        } 

        return $app['twig']->render('user_form.html.twig', array(
            'title' => 'Inscription',
            'userForm' => $userForm->createView()));
    }
    
}   