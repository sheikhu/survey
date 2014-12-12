<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use AppBundle\Entity\Survey;
use AppBundle\Form\SurveyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyController extends Controller
{
    /**
     * @Route("/index", name="home")
     * @Template()
     */
    public function indexAction()
    {
        $survey = new Survey();

        $form = $this->createNewForm($survey)->createView();

        $surveys = $this->getDoctrine()->getManager()
                        ->getRepository('AppBundle:Survey')->findAll();

        return compact('form', 'surveys');
    }

    /**
     * @param Request $request
     * @param Survey $survey
     * @return Response
     * @Route("survey/edit/{id}", name="survey_edit")
     * @Template()
     *
     */
    public function editAction(Request $request, Survey $survey)
    {
        $form = $this->createEditForm($survey)->createView();

        return compact('form', 'survey');
    }

    /**
     * @Route("/survey/new", name="survey_create")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createSurveyAction(Request $request)
    {
        $survey = new Survey();

        $form = $this->createNewForm($survey);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($survey);
            $manager->flush();

            $this->addFlash('success', 'Survey created');
            return $this->redirectToRoute('home');

        }

        return $this->render('@App/Survey/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/survey/update/{id}", name="survey_update")
     * @Method("POST")
     * @param Request $request
     * @param Survey $survey
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateSurveyAction(Request $request, Survey $survey)
    {

        $form = $this->createEditForm($survey);

        $form->handleRequest($request);


        if($form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($survey);
            $manager->flush();

            $this->addFlash('success', 'Survey <'. $survey->getName() .'>updated');
            return $this->redirectToRoute('home');

        }

        return $this->render('@App/Survey/edit.html.twig', ['form' => $form->createView()]);
    }

    protected function createNewForm($survey)
    {
        return $this->createForm(
            new SurveyType(),
            $survey,
            [
                'action'   =>  $this->generateUrl('survey_create'),
                'method'    =>  'POST'
            ]
        );
    }

    protected function createEditForm(Survey $survey)
    {
        return $this->createForm(
            new SurveyType(),
            $survey,
            [
                'action'   =>  $this->generateUrl('survey_update', ['id' => $survey->getId()]),
                'method'    =>  'POST'
            ]
        );
    }
}
