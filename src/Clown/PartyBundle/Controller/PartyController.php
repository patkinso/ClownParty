<?php

namespace Clown\PartyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\PartyBundle\Entity\Party;
use Clown\PartyBundle\Form\PartyType;

/**
 * Party controller.
 *
 */
class PartyController extends Controller
{

    /**
     * Lists all Party entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClownPartyBundle:Party')->findAll();


        return $this->render('ClownPartyBundle:Party:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Party entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Party();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('party_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownPartyBundle:Party:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Party entity.
    *
    * @param Party $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Party $entity)
    {
        $form = $this->createForm(new PartyType(), $entity, array(
            'action' => $this->generateUrl('party_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Party entity.
     *
     */
    public function newAction()
    {
        $entity = new Party();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownPartyBundle:Party:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Party entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownPartyBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownPartyBundle:Party:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Party entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownPartyBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownPartyBundle:Party:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Party entity.
    *
    * @param Party $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Party $entity)
    {
        $form = $this->createForm(new PartyType(), $entity, array(
            'action' => $this->generateUrl('party_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Party entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownPartyBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('party_edit', array('id' => $id)));
        }

        return $this->render('ClownPartyBundle:Party:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Party entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownPartyBundle:Party')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Party entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('party'));
    }

    /**
     * Creates a form to delete a Party entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('party_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
