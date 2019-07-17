<?php

namespace Parallalax\DashboardNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    public function indexAction()
    {

        $newsManager = $this->get('parallalax_dashboard_news.manager.news');
        $news = $newsManager->findAll();

        return $this->render('ParallalaxDashboardNewsBundle::list.html.twig', ['news' => $news]);
    }

    public function editAction(Request $request, $id)
    {

        $manager = $this->container->get('parallalax_dashboard_news.manager.news');
        $news = $manager->find($id);

        $form = $this->container->get('parallalax_dashboard_news.form.factory.news')->createForm();
        $form->setData($news);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Add the thread
            $manager->save($news);
            return $this->redirectToRoute('parallalax_news_homepage');
        }

        //echo get_class($form);die;

        return $this->render('ParallalaxDashboardNewsBundle::edit.html.twig', ['news' => $news, 'form' => $form->createView()]);
    }
}
