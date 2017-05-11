<?php
/*********************************************************
*Gestão de Cursos
*********************************************************/
$this->group(['middleware'=>'auth'],function(){
  $this->get('cadastrar-curso','TeacherController@createCurso')->name('create.course');
  $this->post('cadastrar-curso','TeacherController@storeCurso')->name('store.course');

  $this->get('meus-cursos','TeacherController@courses')->name('teacher.courses');
  $this->any('meus-cursos-search','TeacherController@coursesSearch')->name('teacher.courses.search');
  $this->get('curso-editar/{id}','TeacherController@editCourse')->name('teacher.course.edit');
  $this->put('atualizar-curso/{id}','TeacherController@updateCourse')->name('update.course');
  $this->delete('curso/deletar/{id}','TeacherController@destroyCourse')->name('course.destroy');

  /*********************************************************
  *Gestão de Módulos (Controller resource)
  *********************************************************/
  $this->get('curso/{id}/modulos', 'ModuleController@byCourseId')->name('course.modules'); //rota especifica pra modulo
  $this->resource('modulos','ModuleController', ['except'=>'index']);

  $this->get('minhas-compras','SchoolController@myCourses')->name('sales');//Meus Cursos

  $this->get('minhas-vendas','TeacherController@mySales')->name('my.sales');//Meus Cursos

  $this->get('meus-alunos','TeacherController@myStudents')->name('my.students');//Meus Cursos



  /*********************************************************
  *Gestão de Lessons (Controller resource)
  *********************************************************/
  $this->get('modulo/{id}/aulas', 'LessonController@byModuleId')->name('module.lessons'); //rota especifica pra modulo

  $this->resource('aulas','LessonController', ['except'=>'index']);

});


/*********************************************************
*Gestão de Usuários
*********************************************************/
$this->get('cadastrar', 'UserController@register');
$this->post('new-user','UserController@registring');
$this->get('perfil','UserController@profile')->name('profile');
$this->post('profile-update','UserController@profileUpdate')->name('profile.update');
$this->get('logout', 'UserController@logout');
Auth::routes();

$this->get('aula/{url}','SchoolController@lesson')->name('lesson');

$this->get('curso/{url}','SchoolController@course')->name('course');

$this->get('usuario/{url}','SchoolController@user')->name('user');

$this->get('pedido-realizado','SchoolController@success')->name('success');



$this->get('/', 'SchoolController@index')->name('home');

$this->post('curso-pesquisar','SchoolController@search')->name('courses.search');
