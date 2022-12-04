<?php

namespace App\Controller;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
  
class EditProfileController extends AbstractController
{
     #[Route('/edit' , name:'app_edit')]

    public function editProfile(Request $request,PersistenceManagerRegistry $doctrine)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfileType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('edit/editProfile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}