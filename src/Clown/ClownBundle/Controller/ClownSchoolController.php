<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\ClownBundle\Entity\ClownSchool;
use Clown\ClownBundle\Form\ClownSchoolType;

/**
 * ClownSchool controller.
 *
 */
class ClownSchoolController extends Controller
{

    /**
     * Lists all ClownSchool entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClownClownBundle:ClownSchool')->findAll();

        return $this->render('ClownClownBundle:ClownSchool:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ClownSchool entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ClownSchool();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clownschool_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownClownBundle:ClownSchool:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ClownSchool entity.
    *
    * @param ClownSchool $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ClownSchool $entity)
    {
        $form = $this->createForm(new ClownSchoolType(), $entity, array(
            'action' => $this->generateUrl('clownschool_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ClownSchool entity.
     *
     */
    public function newAction()
    {
        $entity = new ClownSchool();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownClownBundle:ClownSchool:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClownSchool entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownSchool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownSchool entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:ClownSchool:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ClownSchool entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownSchool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownSchool entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:ClownSchool:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ClownSchool entity.
    *
    * @param ClownSchool $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ClownSchool $entity)
    {
        $form = $this->createForm(new ClownSchoolType(), $entity, array(
            'action' => $this->generateUrl('clownschool_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ClownSchool entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownSchool')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownSchool entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clownschool_edit', array('id' => $id)));
        }

        return $this->render('ClownClownBundle:ClownSchool:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ClownSchool entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownClownBundle:ClownSchool')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClownSchool entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clownschool'));
    }

    /**
     * Creates a form to delete a ClownSchool entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clownschool_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
