<?php

namespace CL\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CL\BlogBundle\Entity\Advert;
use CL\BlogBundle\Entity\Image; 

/**
* @Template
*/

class AdvertController extends Controller
{
    public function indexAction($page)
    {
		if ($page < 1){  #gérer les exceptions, erreur 404
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
		
		//Récupérer la liste d'articles
		$listAdverts = $this->getDoctrine()
			->getManager()
			->getRepository('CLBlogBundle:Advert')
			->getAdverts()  //récupérer Entités
		;
		
		//Appel de la vue
        return $this->render('CLBlogBundle:Advert:index.html.twig', array('listAdverts' => $listAdverts
		));
	}
	
	public function viewAction($id) #récupérer l'article correspondant à l'id
	{
		$em = $this->getDoctrine()->getManager();
		$advert = $em
			->getRepository('CLBlogBundle:Advert')
			->find($id);
		
		// Exception : id n'existe pas
		if (null === $advert) {
			throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
		}
		
		return $this->render('CLBlogBundle:Advert:view.html.twig', array('advert'=> $advert)
		);
	}
	
	public function addAction(Request $request)
	{
		
		
		#Gestion de formulaire, POST : visiteur a soumis le formulaire
		if($request->isMethod('POST')){
			$title=$_POST['title'];
			$author=$_POST['author'];
			$content=$_POST['content'];
			$url=$_POST['url'];
			$alt=$_POST['alt'];
			
			$image = new Image();
			$image->setUrl($url);
			$image->setAlt($alt);
			
			$advert = new Advert();
			$advert->setTitle($title);
			$advert->setAuthor($author);
			$advert->setContent($content);
			$advert->setImage($image);
			
		
			
		//Récupération de l'EntityManager
		$em = $this->getDoctrine()->getManager();
		
		// Etape 1 : on persiste l'entité
		$em->persist($advert);
		$em->persist($image);
		
		// Etape 2 : on flush tout ce qui a été persisté avant
		$em->flush();  
		
			#Redirection à la page visualisant l'article
			return $this->redirect($this->generateUrl('cl_blog_view', array('id'=>$advert->getId())));
		}
		
		#Pas méthode POST : afficher le formulaire
		return $this->render('CLBlogBundle:Advert:add.html.twig');
	}
	
	public function editAction($id) #Récupérer l'article correspondant à id
	{

		
		//Récupération de l'Entity Manager
		$em = $this->getDoctrine()->getManager();
		//Récupération de l'id correspondant
		$advert = $em->getRepository('CLBlogBundle:Advert')->find($id);
		//erreur 404
		
		if ($advert == null) {
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
		
		
		return $this->render('CLBlogBundle:Advert:edit.html.twig', array( 'advert' => $advert
		));
		
	}
	
	public function deleteAction($id, Request $request) #Supprimer l'article correspondant à l'id
	{
		$em = $this->getDoctrine()->getManager();
		$advert = $em->getRepository('CLBlogBundle:Advert')->find($id);
		if ($advert == null) {
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
		
		if($request->isMethod('POST')) {
			$em->remove($advert);
			$em->flush();
			
			
		return $this->redirect($this->generateUrl('cl_blog_home'));
		}
		
		return $this->render('CLBlogBundle:Advert:delete.html.twig', array('advert' => $advert
		));
	
	}

	public function menuAction($limit = 3) #Menu
	{
		#On crée une liste en dur, mais elle sera récupérée depuis la bdd
		$listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('CLBlogBundle:Advert')
      ->findBy(
        array(),                 // Pas de critère
        array('date' => 'desc'), // On trie par date décroissante
        $limit,                  // On sélectionne $limit annonces
        0                        // À partir du premier
    );

    return $this->render('CLBlogBundle:Advert:menu.html.twig', array(
      'listAdverts' => $listAdverts
		));
	}
		
		
		
}