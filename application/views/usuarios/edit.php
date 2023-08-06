

<?php $this->load->view('layout/sidebar'); ?>

    

      <!-- Main Content -->
      <div id="content">

<?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios'); ?>" >Usuarios</a></li>
         <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
        </nav>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-chevron-left"></i>&nbsp Voltar </a>
            </div>
            <div class="card-body">

            <form method="POST" name="form_edit">
          <div class="form-group row">
              <div class="col-md-4">
                <label>Nome</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $usuario->first_name; ?>">
                <?php echo form_error('first_name', '<div class="text-danger">',' </div>'); ?>
              </div>

              <div class="col-md-4">
                <label>Sobrenome</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $usuario->last_name; ?>">
                
              </div>

              <div class="col-md-4">
                <label>Usuario</label>
                <input type="text" class="form-control" name="username" value="<?php echo $usuario->username; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

              <div class="col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $usuario->email; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

              <div class="col-md-4">
                  
                  <label>Ativo</label>

                  <select class="form-control" name="active">
                      
                      <option value="2" <?php echo ($usuario->active == 2) ? 'selected' : '' ?>>Nao</option>
                      <option value="1" <?php echo ($usuario->active == 1) ? 'selected' : '' ?>>Sim</option>
                         
                  </select>
          
              </div>

              <div class="col-md-4">
                  
                  <label>Perfil</label>

                  <select class="form-control" name="perfil">
                      
                      <option value="2" <?php echo ($perfil->id == 2) ? 'selected' : '' ?>>Vendedor</option>
                      <option value="1" <?php echo ($perfil->id == 1) ? 'selected' : '' ?>>Administrador</option>
                         
                  </select>
          
              </div>



              <div class="col-md-6">
                <label>Senha</label>
                <input type="password" class="form-control" name="confirm_password" value="<?php echo $usuario->password; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

              <div class="col-md-6">
                <label>Confirme a senha</label>
                <input type="password" class="form-control" name="password" value="<?php echo $usuario->password; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

              
              
              <input type="hidden" name="usuario_id" value="<?php echo $usuario->id ?>">
              
          </div>  

               <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sd-card"></i>&nbspSalvar</button>

            </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      