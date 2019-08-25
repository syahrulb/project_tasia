@extends('layouts.layout')

@section('Title')
    Laporan
@endsection

@section('Content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Detail Jurnal
                <small>Tambah</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Detail Jurnal</a></li>
                <li class="active">Tambah</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detail Jurnal</h3>
                            <div class="box-tools">
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <!--buka-->
                                <form role="form" method="POST" action="<?php echo url("simpandetailjurnal");?>">
                                  {{ csrf_field() }}
                                   <input type="hidden" name="id" value="<?php echo $id;?>"/>
                                  <div class="col-md-12">
                                      
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis</label>
                                        <select class="form-control" name="jenis">
                                            <option value="Debet">Debet</option>
                                            <option value="Kredit">Kredit</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Akun</label>
                                        <select class="form-control" name="akun">
                                            <?php
                                                for ($i=0;$i<count($akun);$i++)
                                                {
                                                    ?>
                                                      <option value="<?php echo $akun[$i]->id_akun;?>">
                                                        <?php
                                                          echo $akun[$i]->nama_akun;
                                                        ?>
                                                      </option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah"/>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <button type="submit" class="btn btn-primary">Submit</button> | <a href="<?php echo url("jurnal");?>">Kembali</a>
                                  </div>
                                </form>
                            <!--tutup-->    

                        </div>
                </div>
            </div>
        </section>
    </div>

@endsection
