<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\ClownBundle\Entity\ClownType;
use Clown\ClownBundle\Form\ClownTypeType;

/**
 * ClownType controller.
 *
 */
class ClownTypeController extends Controller
{

    /**
     * Lists all ClownType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClownClownBundle:ClownType')->findAll();

        return $this->render('ClownClownBundle:ClownType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ClownType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ClownType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clowntype_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownClownBundle:ClownType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ClownType entity.
    *
    * @param ClownType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ClownType $entity)
    {
        $form = $this->createForm(new ClownTypeType(), $entity, array(
            'action' => $this->generateUrl('clowntype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ClownType entity.
     *
     */
    public function newAction()
    {
        $entity = new ClownType();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownClownBundle:ClownType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClownType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:ClownType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ClownType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:ClownType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ClownType entity.
    *
    * @param ClownType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ClownType $entity)
    {
        $form = $this->createForm(new ClownTypeType(), $entity, array(
            'action' => $this->generateUrl('clowntype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ClownType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:ClownType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClownType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clowntype', array('id' => $id)));
        }

        return $this->render('ClownClownBundle:ClownType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ClownType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownClownBundle:ClownType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClownType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clowntype'));
    }

    /**
     * Creates a form to delete a ClownType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clowntype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
