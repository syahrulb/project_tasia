@extends('layouts.layout')

@section('Title')
    Laporan
@endsection

@section('Content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Jurnal
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Jurnal</a></li>
                <li class="active">View</li>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Tanggal
                                        </th>
                                        <th>
                                            Keterangan
                                        </th>
                                        <th>
                                            No Bukti
                                        </th>
                                        <th>
                                            Jenis
                                        </th>
                                        <th>
                                            Debet
                                        </th>
                                        <th>
                                            Kredit
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        for ($i=0;$i<count($jurnal);$i++)
                                        {
                                            $detailjurnal=$jurnal[$i];
                                            ?>
                                              <tr>
                                                  <td>
                                                      <?php
                                                        echo date("d-M-Y",strtotime($detailjurnal->tanggal_jurnal));
                                                      ?>
                                                  </td>
                                                  <td>
                                                      <?php
                                                        echo $detailjurnal->keterangan;
                                                      ?>
                                                  </td>
                                                  <td>
                                                      <?php
                                                        echo $detailjurnal->no_bukti;
                                                      ?>
                                                  </td>
                                                  <td>
                                                      <?php
                                                        echo $detailjurnal->jenis;
                                                      ?>
                                                  </td>
                                                  <td></td><td></td>
                                                  <td>
                                                      <a href="updatejurnal/<?php echo $detailjurnal->id;?>">Update</a>
                                                      |
                                                      <a href="deletejurnal/<?php echo $detailjurnal->id;?>">Delete</a>
                                                      |
                                                      <a href="detailjurnal/<?php echo $detailjurnal->id;?>">Detail</a>
                                                  </td>
                                              </tr>
                                            <?php
                                            $dtl=$detailjurnal->detail;
                                            for ($ix=0;$ix<count($dtl);$ix++)
                                            {
                                                ?>
                                                  <tr>
                                                      <td>
                                                      </td>
                                                      <td colspan=3>
                                                            <?php
                                                               if ($dtl[$ix]->kredit>0)
                                                               {
                                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                               }
                                                                echo $dtl[$ix]->nama_akun;
                                                            ?>
                                                      </td>
                                                      <td style="text-align:right">
                                                          <?php
                                                            echo number_format($dtl[$ix]->debet);
                                                          ?>
                                                      </td>
                                                      <td style="text-align:right">
                                                          <?php
                                                            echo number_format($dtl[$ix]->kredit);
                                                          ?>
                                                      </td>
                                                      <td>
                                                      </td>
                                                  </tr>
                                                <?php
                                            }
                                            ?>
                                              <tr>
                                                 <td colspan="7">
                                                    <br/><br/>
                                                 </td>
                                              </tr>
                                            <?php
                                        }
                                      ?>
                                </tbody>
                            </table>

                            <a href="<?php echo url("tambahjurnal");?>">Tambah</a>
                        </div>
                </div>
            </div>
        </section>
    </div>

@endsection
