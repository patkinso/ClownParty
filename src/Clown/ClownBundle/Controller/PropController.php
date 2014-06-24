<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\ClownBundle\Entity\Prop;
use Clown\ClownBundle\Form\PropType;

/**
 * Prop controller.
 *
 */
class PropController extends Controller
{

    /**
     * Lists all Prop entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClownClownBundle:Prop')->findAll();

        return $this->render('ClownClownBundle:Prop:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Prop entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Prop();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prop_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownClownBundle:Prop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Prop entity.
    *
    * @param Prop $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Prop $entity)
    {
        $form = $this->createForm(new PropType(), $entity, array(
            'action' => $this->generateUrl('prop_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Prop entity.
     *
     */
    public function newAction()
    {
        $entity = new Prop();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownClownBundle:Prop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Prop entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Prop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:Prop:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    public function showPropListAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Clown')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clown entity.');
        }

        $qb = $em->getRepository('ClownClownBundle:Prop')->createQueryBuilder('prop');
        $qb->join('prop.clown', 'clown');
        $qb->andWhere($qb->expr()->eq('clown.id', ':clownid'));
        $qb->setParameter('clownid', $id);
        $entities = $qb->getQuery()->getResult();

        return $this->render('ClownClownBundle:Prop:clownpropslist.html.twig', array(
            'entities'      => $entities
        ));
    }

    /**
     * Displays a form to edit an existing Prop entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Prop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prop entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:Prop:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Prop entity.
    *
    * @param Prop $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Prop $entity)
    {
        $form = $this->createForm(new PropType(), $entity, array(
            'action' => $this->generateUrl('prop_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Prop entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Prop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prop_edit', array('id' => $id)));
        }

        return $this->render('ClownClownBundle:Prop:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Prop entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownClownBundle:Prop')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prop entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prop'));
    }

    /**
     * Creates a form to delete a Prop entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prop_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
