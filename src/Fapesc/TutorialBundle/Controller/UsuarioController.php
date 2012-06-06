<?php
namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Usuario;

class UsuarioController extends FapescController
{
	/**
	* @Route("/cadastrar")
	* @Template("FapescTutorialBundle:Visitante:dados.html.twig")
	*/
	public function cadastrarAction()
	{
		$usuario = new Usuario();
		return array_merge(array("action" => $this->get("router")->generate("cadastrarPost", array())), $usuario->toArray());
	}

	/**
	* @Route("/cadastrar/post")
	* @Template()
	*/
	public function cadastrarPostAction()
	{
		$usuario = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Usuario")
			->findOneBy(array("cpf" => $_POST["cpf"]));
		if (is_object($usuario)) {
			$this->get("session")->set("cpf", $_POST["cpf"]);
			$this->get("session")->setFlash("erro", "CPF já cadastrado!");
			return $this->forward("FapescTutorialBundle:Usuario:recuperar", array());
		}

		$usuario = new Usuario();
		$usuario->populate($_POST);

		$senha = substr(sha1(rand()), -4);

		$usuario->setSenha($this->get("security.encoder_factory")->getEncoder($usuario)->encodePassword($senha, $usuario->getSalt()));

		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($usuario);
		$em->flush();

		$message = \Swift_Message::newInstance()
			->setSubject("FAPESC - Cadastro")
			->setFrom("cadastro@fapesc.sc.gov.br")
			->setTo($_POST["email"])
			->setBody($this->renderView("FapescTutorialBundle:Email:cadastro.html.twig", array(
				"senha" => $senha,
				"link" => "http://" . $_SERVER["HTTP_HOST"] . $this->get("router")->generate("login", array()))))
			->setContentType("text/html");
		$this->get("mailer")->send($message);

		$this->get("session")->setFlash("sucesso", "Usuário cadastrado com sucesso! A senha de acesso foi enviada por email.");
		$this->get("session")->set("cpf", $_POST["cpf"]);
		return $this->forward("FapescTutorialBundle:Usuario:login", array());
	}

	/**
	* @Route("/recuperar")
	* @Template("FapescTutorialBundle:Visitante:recupera.html.twig")
	*/
	public function recuperarAction()
	{
		return array(
			"cpf" => $this->get("session")->get("cpf"),
			"email" => $this->get("session")->get("email"),
		);
	}

	/**
	* @Route("/recuperar/post")
	* @Template()
	*/
	public function recuperarPostAction()
	{
		$usuario = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Usuario")
			->findOneBy(array("cpf" => $_POST["cpf"], "email" => $_POST["email"]));
		if (is_object($usuario)) {
			$message = \Swift_Message::newInstance()
				->setSubject("FAPESC - Senha")
				->setFrom("senha@fapesc.sc.gov.br")
				->setTo($_POST["email"])
				->setBody($this->renderView("FapescTutorialBundle:Email:senha.html.twig", array(
					"link" => "http://" . $_SERVER["HTTP_HOST"] . $this->get("router")->generate("recuperarSenha", array(
						"cpf" => $usuario->getCpf(),
						"email" => $usuario->getEmail(),
						"hash" => sha1($usuario->getCpf() . "fapesc2012" . $usuario->getEmail()))))))
				->setContentType("text/html");
			$this->get("mailer")->send($message);
			$this->get("session")->setFlash("sucesso", "Senha enviada com sucesso! Verifique seu email.");
			$this->get("session")->set("cpf", $_POST["cpf"]);
			return $this->forward("FapescTutorialBundle:Usuario:login", array());
		} else {
			$this->get("session")->setFlash("erro", "CPF e E-mail não combinam!");
			$this->get("session")->set("cpf", $_POST["cpf"]);
			$this->get("session")->set("email", $_POST["email"]);
			return $this->forward("FapescTutorialBundle:Usuario:recuperar", array());
		}
	}

	/**
	* @Route("/recuperar/senha/{cpf}/{email}/{hash}")
	* @Template("FapescTutorialBundle:Visitante:senha.html.twig")
	*/
	public function recuperarSenhaAction($cpf, $email, $hash)
	{
		if ($hash == sha1($cpf . "fapesc2012" . $email)) {
			return array(
				"action" => $this->get("router")->generate("recuperarSenhaPost", array(
					"cpf" => $cpf,
					"email" => $email,
					"hash" => $hash,
				)),
			);
		} else {
			$this->get("session")->setFlash("erro", "CPF e E-mail não combinam!");
			return $this->forward("FapescTutorialBundle:Usuario:login", array("cpf" => $cpf));
		}
	}

	/**
	* @Route("/recuperar/senha/{cpf}/{email}/{hash}/post")
	* @Template()
	*/
	public function recuperarSenhaPostAction($cpf, $email, $hash)
	{
		if ($hash == sha1($cpf . "fapesc2012" . $email)) {
			$usuario = $this->getDoctrine()
				->getRepository("FapescTutorialBundle:Usuario")
				->findOneBy(array("cpf" => $cpf, "email" => $email));
			if (is_object($usuario)) {
				//encripta senha
				$factory = $this->get("security.encoder_factory");
				$encoder = $factory->getEncoder($usuario);
				$senha = $encoder->encodePassword($_POST["senha1"], $usuario->getSalt());
				$usuario->setSenha($senha);
				$em = $this->getDoctrine()->getEntityManager();
				$em->flush();
				$this->get("session")->setFlash("sucesso", "Senha alterada com sucesso!");
				$this->get("session")->set("cpf", $cpf);
				return $this->forward("FapescTutorialBundle:Usuario:login", array());
			}
		}
		$this->get("session")->setFlash("erro", "CPF e E-mail não combinam!");
		return $this->forward("FapescTutorialBundle:Usuario:login", array("cpf" => $cpf));
	}

	/**
	* @Route("/login")
	* @Template("FapescTutorialBundle:Visitante:login.html.twig")
	*/
	public function loginAction()
	{
		$request = $this->getRequest();
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR) || $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
        	$session->remove(SecurityContext::AUTHENTICATION_ERROR);
            $session->setFlash("erro", "Falha na autenticação do usuário!");
            $this->get("session")->set("cpf", $session->get(SecurityContext::LAST_USERNAME));
        }
        return array("cpf" => $session->get("cpf"));
	}

	/**
	* @Route("/loginPost")
	* @Template()
	*/
	public function loginPostAction()
	{
	}

	/**
	* @Route("/perfil")
	* @Template("FapescTutorialBundle:Usuario:dados.html.twig")
	*/
	public function perfilAction()
	{
		$usuario = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Usuario")
			->find($this->get("security.context")->getToken()->getUser()->getId());
		return array_merge($this->usuario(), $usuario->toArray(), array("action" => $this->get("router")->generate("perfilPost", array())));
	}

	/**
	* @Route("/perfil/post")
	* @Template()
	*/
	public function perfilPostAction()
	{
		$usuario = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Usuario")
			->find($this->get("security.context")->getToken()->getUser()->getId());
		$usuario->populate($_POST);

		$this->getDoctrine()->getEntityManager()->flush();

		$this->get("session")->setFlash("sucesso", "Usuario editado com sucesso!");
		return $this->forward("FapescTutorialBundle:Usuario:perfil", array());
	}

	/**
	* @Route("/senha")
	* @Template("FapescTutorialBundle:Usuario:senha.html.twig")
	*/
	public function senhaAction()
	{
		return array(
			"usuario" => $this->get("security.context")->getToken()->getUser()->toArray(),
			"action" => $this->get("router")->generate("senhaPost", array()),
		);
	}

	/**
	* @Route("/senha/post")
	* @Template()
	*/
	public function senhaPostAction()
	{
		$usuario = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Usuario")
			->find($this->get("security.context")->getToken()->getUser()->getId());
		$usuario->setSenha($this->get("security.encoder_factory")->getEncoder($usuario)->encodePassword($_POST["senha1"], $usuario->getSalt()));
		$this->getDoctrine()->getEntityManager()->flush();
		$this->get("session")->setFlash("sucesso", "Senha alterada com sucesso!");
		return $this->forward("FapescTutorialBundle:Usuario:perfil", array());
	}

	/**
	* @Route("/logout")
	* @Template()
	*/
	public function logoutAction()
	{
	}
}
