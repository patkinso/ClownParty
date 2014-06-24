<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Clown\ClownBundle\Entity\Clown;
use Clown\ClownBundle\Form\ClownType;

/**
 * Clown controller.
 *
 */
class ClownController extends Controller
{

    /**
     * Lists all Clown entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('ClownClownBundle:Clown')->findAll();

//        Constructing a querry, $qb is what we use to hold a query we are building.
//        It is created by having our event manager getRepository and then createQueryBuilder();
//        leftJoin()
//       addSelect()
        // $qb = $em->getRepository('ClownClownBundle:Clown')->createQueryBuilder('clown');
        // $qb->leftJoin('clown.prop', 'prop');
        // $qb->addSelect('prop');
        // $qb->leftJoin('clown.clownSchoolAttendance', 'attendance');
        // $qb->addSelect('attendance');
        // $qb->leftJoin('attendance.school', 'school');
        // $qb->addSelect('school');
        // $qb->leftJoin('prop.propType', 'propType');
        // $qb->addSelect('propType');
        // var_dump($qb->getDQLParts()['select']);
        // print_r('<br><br>');
        // print_r($qb->getQuery()->getSQL());
        // die;

        $qb = $em->getRepository('ClownClownBundle:Clown')->createQueryBuilder('clown');
        $qb->leftJoin('clown.prop', 'prop');
        // $qb->leftJoin('clown.prop', 'prop', Expr\Join::WITH, $qb->expr()->orX($qb->expr()->lte('prop.quality', '-10'), $qb->expr()->gte('prop.quality', '8')));
//      Show only Exceptional quality props
        // $qb->andWhere($qb->expr()->orX($qb->expr()->lte('prop.quality', '-10'), $qb->expr()->gte('prop.quality', '8')));
        $qb->addSelect('prop');
        // $qb->where('clown.id = 1');
        $qb->leftJoin('clown.clownSchoolAttendance', 'attendance');
        $qb->addSelect('attendance');
        $qb->leftJoin('attendance.school', 'school');
        $qb->addSelect('school');
        $qb->leftJoin('prop.propType', 'propType');
        $qb->addSelect('propType');
        $qb->addOrderBy('clown.name', 'DESC');
        // var_dump($qb->getDQLParts()['select']);
        // print_r('<br><br>');
        // print_r($qb->getQuery()->getSQL());
        // die;

        $entities = $qb->getQuery()->getResult();

        return $this->render('ClownClownBundle:Clown:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Clown entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Clown();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clown_show', array('id' => $entity->getId())));
        }

        return $this->render('ClownClownBundle:Clown:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Clown entity.
    *
    * @param Clown $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Clown $entity)
    {
        $form = $this->createForm(new ClownType(), $entity, array(
            'action' => $this->generateUrl('clown_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Clown entity.
     *
     */
    public function newAction()
    {
        $entity = new Clown();
        $form   = $this->createCreateForm($entity);

        return $this->render('ClownClownBundle:Clown:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Clown entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Clown')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clown entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:Clown:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Clown entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Clown')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clown entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ClownClownBundle:Clown:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Clown entity.
    *
    * @param Clown $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Clown $entity)
    {
        $form = $this->createForm(new ClownType(), $entity, array(
            'action' => $this->generateUrl('clown_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Clown entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClownClownBundle:Clown')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clown entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clown_edit', array('id' => $id)));
        }

        return $this->render('ClownClownBundle:Clown:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Clown entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClownClownBundle:Clown')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Clown entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clown'));
    }

    /**
     * Creates a form to delete a Clown entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clown_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function buttsAction()
    {
        return $this->render('ClownClownBundle:Clown:butts.html.twig', array(
        ));
    }
}
