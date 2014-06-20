<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\ClownBundle\Entity\PropType;
use Clown\ClownBundle\Form\PropTypeType;

/**
 * PropType controller.
 *
 */
class PropTypeController extends Controller
{

    /**
     * Lists all PropType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClownClownBundle:PropType')->findAll();

        return $this->render('ClownClownBundle:PropType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PropType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PropType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proptype_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownClownBundle:PropType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a PropType entity.
    *
    * @param PropType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PropType $entity)
    {
        $form = $this->createForm(new PropTypeType(), $entity, array(
            'action' => $this->generateUrl('proptype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PropType entity.
     *
     */
    public function newAction()
    {
        $entity = new PropType();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownClownBundle:PropType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:PropType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PropType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:PropType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PropType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:PropType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PropType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:PropType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PropType entity.
    *
    * @param PropType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PropType $entity)
    {
        $form = $this->createForm(new PropTypeType(), $entity, array(
            'action' => $this->generateUrl('proptype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PropType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:PropType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PropType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proptype_edit', array('id' => $id)));
        }

        return $this->render('ClownClownBundle:PropType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PropType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownClownBundle:PropType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PropType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proptype'));
    }

    /**
     * Creates a form to delete a PropType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proptype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
