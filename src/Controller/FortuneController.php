<?php

namespace App\Controller;

use App\Domain\ShowFortuneException;
use App\Domain\ShowFortuneUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FortuneController extends AbstractController
{
    /**
     * @var ShowFortuneUseCase
     */
    private $showFortuneUseCase;

    /**
     * FortuneController constructor.
     * @param ShowFortuneUseCase $showFortuneUseCase
     */
    public function __construct(ShowFortuneUseCase $showFortuneUseCase)
    {
        $this->showFortuneUseCase = $showFortuneUseCase;
    }

    /**
     * @Route("/", name="fortune_index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('fortune/index.html.twig');
    }

    /**
     * @Route("/show", name="fortune_show")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function show(Request $request): Response
    {
        $birthday = new \DateTimeImmutable($request->query->get('birthday'));

        try {
            $fortune = $this->showFortuneUseCase->showFortune($birthday);
        } catch (ShowFortuneException $e) {
            throw new BadRequestHttpException();
        }

        return $this->render('fortune/show.html.twig', [
            'fortune' => $fortune,
        ]);
    }
}
