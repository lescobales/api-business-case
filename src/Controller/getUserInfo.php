<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class getUserInfo extends AbstractController
{
	public function __construct(private UserRepository $userRepository){

	}
   #[Route('/api/user_info', name: 'app_api_user_info', methods: ['GET', 'POST'])]
    public function getUserInfo(Request $request): Response
    {
	    $offset = $request->get('offset');
	   $limit = $request->get('limit'); 
	    $res = $this->userRepository->getUserInfo($limit, $offset);
  //Récupérer les lignes
	return new Response(json_encode($res));
    }
}
