<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_index", methods="GET")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('category/index.html.twig', ['categories' => $categories]);
    }

    /**
     * @Route("/new", name="category_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_show", methods="GET")
     */
    public function show(Category $category): Response
    {
        $traobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(["category" => $category]);

        return $this->render('category/show.html.twig', ['category' => $category, 'traobjects' => $traobjects]);
    }

    /**
     * @Route("/{id}/edit", name="category_edit", methods="GET|POST")
     */
    public function edit(Request $request, Category $category): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_index', ['id' => $category->getId()]);
        }

        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_delete", methods="DELETE")
     */
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirectToRoute('category_index');
    }

    public function dropdown()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('category/dropdown.html.twig', ['categories' => $categories]);

    }

    public function traobjectByCatByState()
    {
        $lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::LOST]);
        $find = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::FIND]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByCat('', $lost, 6);
        $traobjectsFound =$this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByCat('' , $find, 6);

        return $this->render('default/homepage.html.twig', ['traobjectsLost' => $traobjectsLost, 'traobjectsFound' => $traobjectsFound ]);

    }
}
