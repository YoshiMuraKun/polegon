<?php

/**
 * Post actions.
 *
 * @package    MySite
 * @subpackage Post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostActions extends sfActions
{

  public function executeTest(sfWebRequest $request)
  {

    var_dump($this->getRoute()->getParameters());
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->postss = Doctrine_Core::getTable('Posts')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PostsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PostsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($posts = Doctrine_Core::getTable('Posts')->find(array($request->getParameter('id'))), sprintf('Object posts does not exist (%s).', $request->getParameter('id')));
    $this->form = new PostsForm($posts);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($posts = Doctrine_Core::getTable('Posts')->find(array($request->getParameter('id'))), sprintf('Object posts does not exist (%s).', $request->getParameter('id')));
    $this->form = new PostsForm($posts);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($posts = Doctrine_Core::getTable('Posts')->find(array($request->getParameter('id'))), sprintf('Object posts does not exist (%s).', $request->getParameter('id')));
    $posts->delete();

    $this->redirect('Post/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $posts = $form->save();

      $this->redirect('Post/edit?id='.$posts->getId());
    }
  }
}
