@extends('layouts.layout')

@section('Title')
    Laporan
@endsection

@section('Content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Jurnal
                <small>Tambah</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Jurnal</a></li>
                <li class="active">Tambah</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Jurnal</h3>
                            <div class="box-tools">
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <!--buka-->
                                <form role="form" method="POST" action="<?php echo url("simpanjurnal");?>">
                                  {{ csrf_field() }}
                                 
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Bukti</label>
                                        <input type="text" class="form-control" name="nomor_bukti" placeholder="Masukkan nomor bukti"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" placeholder="Masukkan nomor bukti"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis</label>
                                        <select class="form-control" name="jenis">
                                            <option value="Jurnal Penutup">Jurnal Manual</option>
                                            <!-- <option value="Jurnal Penyesuaian">Jurnal Penyesuaian</option> -->
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Periode</label>
                                        <select class="form-control" name="periode">
                                            <?php
                                                for ($i=0;$i<count($periode);$i++)
                                                {
                                                    ?>
                                                      <option value="<?php echo $periode[$i]->id_periode?>">
                                                        Tanggal <?php echo date("d-M-Y",strtotime($periode[$i]->tanggal_awal))." s/d ".date("d-M-Y",strtotime($periode[$i]->tanggal_akhir)) ?>
                                                      </option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
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
