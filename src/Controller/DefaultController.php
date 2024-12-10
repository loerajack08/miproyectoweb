<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Producto; // O la entidad correspondiente, como Registro
use App\Entity\Registro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductoType;
use Doctrine\DBAL\Schema\View;

class DefaultController extends AbstractController
{
    #[Route('/hola', name: 'principal')]
    public function hello(): Response
    {
        return $this->render('elnumero1.html.twig');
    }

    #[Route('/serviciosextra','serviciosextra')]
    public function extra()
    {
        return $this->render('paginasocios.html.twig');
    }

    #[Route('/missocios','missocios')]
    public function socios()
    {
        return $this->render('missocios.html.twig');
    }

    #[Route('/nuestraspaginas','nuestraspaginas')]
    public function mas()
    {
        return $this->render('paginasechaspormi.html.twig');
    }

    #[Route('/loscostos','loscostos')]
    public function aumas()
    {
        return $this->render('costos.html.twig');
    }


    #[Route(path:'/registro', name:'registro',methods:['POST'])]
    public function registro(Request $request, EntityManagerInterface $entityManager) : Response
    {
        // Obtenemos los datos del formulario
        $nombre = $request->request->get('nombre');
        $numero = $request->request->get('numero');
        $correo = $request->request->get('correo');
        $mensajes = $request->request->get('mensajes');

        // Crear una nueva instancia de la entidad, en este caso Producto o Registro
        $producto = new Registro(); 

        // Asignar los datos del formulario a la entidad
        $producto->setNombre($nombre);
        $producto->setNumero($numero);
        $producto->setCorreo(correo: $correo);
        $producto->setMensajes($mensajes);

        // Persistir los datos en la base de datos
        $entityManager->persist($producto);
        $entityManager->flush(); // Guardar los cambios en la base de datos

        // Redirigir a una página o mostrar un mensaje de éxito
        return $this->redirectToRoute('principal'); // Cambia 'principal' a la ruta que desees
    }
}
