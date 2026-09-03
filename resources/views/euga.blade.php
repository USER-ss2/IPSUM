@extends('adminlte::page')

@section('title', 'IPSUM')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SAV Fixe</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Rapport d'Activité EUGA</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop


@section('content')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@php
    $heads = [
        'ID',
        'Name',
        'date_ouverture',
        'date_resolution',
        'date_cloture',
        'etat',
        'phase',
        'groupe-resolution',
        'groupe_cloture',
        'groupe_affectation',
        'zone',
    ];
@endphp

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher</h3>
                    </div>

                    @if ($test == 1)
                        <div class="card-body">
                            <form action="/euga_recherche" method="POST">
                                <div class="row">
                                    @csrf


                                    <div class="col-4">
                                        Date de début:
                                        <input type="text" id="my_date_picker1" name="debut" value={{ $information->debut }}>
                                    </div>

                                    <div class="col-4">
                                        Date de fin:
                                        <input type="text" id="my_date_picker2" name="fin" value={{ $information->fin }}>

                                    </div>

                                    <div class= "col-4">
                                        <div class="form-group row">
                                            <label for="selection" class="col-sm-2 col-form-label">EUGA</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" id="selection" name="euga">
                                                    <option value="EUGA HACHED"
                                                    {{ 'EUGA HACHED' == $information->euga ? 'selected' : '' }}>EUGA HACHED</option>
                                                    <option value="EUGA RAOUED"
                                                    {{ 'EUGA RAOUED' == $information->euga ? 'selected' : '' }}>EUGA RAOUED</option>
                                                    <option value="EUGA MEDENINE SUD"
                                                    {{ 'EUGA MEDENINE SUD' == $information->euga ? 'selected' : '' }}>EUGA MEDENINE SUD</option>
                                                    <option value="EUGA BERGES DU LAC"
                                                    {{ 'EUGA BERGES DU LAC' == $information->euga ? 'selected' : '' }}>EUGA BERGES DU LAC</option>
                                                    <option value="EUGA HRAIRIA"
                                                    {{ 'EUGA HRAIRIA' == $information->euga ? 'selected' : '' }}>EUGA HRAIRIA</option>
                                                    <option value="EUGA BORJ_LOUZIR"
                                                    {{ 'EUGA BORJ_LOUZIR' == $information->euga ? 'selected' : '' }}>EUGA BORJ_LOUZIR</option>
                                                    <option value="EUGA ARIANA"
                                                    {{ 'EUGA ARIANA' == $information->euga ? 'selected' : '' }}>EUGA ARIANA</option>
                                                    <option value="EUGA SFAX NORD"
                                                    {{ 'EUGA SFAX NORD' == $information->euga ? 'selected' : '' }}>EUGA SFAX NORD</option>
                                                    <option value="EUGA BIZERTE"
                                                    {{ 'EUGA BIZERTE' == $information->euga ? 'selected' : '' }}>EUGA BIZERTE</option>
                                                    <option value="EUGA ZAGHOUAN"
                                                    {{ 'EUGA ZAGHOUAN' == $information->euga ? 'selected' : '' }}>EUGA ZAGHOUAN</option>
                                                    <option value="EUGA MOKNINE"
                                                    {{ 'EUGA MOKNINE' == $information->euga ? 'selected' : '' }}>EUGA MOKNINE</option>
                                                    <option value="EUGA TOZEUR"
                                                    {{ 'EUGA TOZEUR' == $information->euga ? 'selected' : '' }}>EUGA TOZEUR</option>
                                                    <option value="EUGA GROMBALIA"
                                                    {{ 'EUGA GROMBALIA' == $information->euga ? 'selected' : '' }}>EUGA GROMBALIA</option>

                                                    <option value="EUGA KAIROUAN"
                                                    {{ 'EUGA KAIROUAN' == $information->euga ? 'selected' : '' }}>EUGA KAIROUAN</option>
                                                    <option value="EUGA H LIF"
                                                    {{ 'EUGA H LIF' == $information->euga ? 'selected' : '' }}>EUGA H LIF</option>
                                                    <option value="EUGA ENFIDHA"
                                                    {{ 'EUGA ENFIDHA' == $information->euga ? 'selected' : '' }}>EUGA ENFIDHA</option>
                                                    <option value="EUGA S.EL JADIDA"
                                                    {{ 'EUGA HACHED' == $information->euga ? 'selected' : '' }}>EUGA S.EL JADIDA</option>
                                                    <option value="EUGA DAR CHAABENE"
                                                    {{ 'EUGA DAR CHAABENE' == $information->euga ? 'selected' : '' }}>EUGA DAR CHAABENE</option>
                                                    <option value="EUGA OUARDIA"
                                                    {{ 'EUGA OUARDIA' == $information->euga ? 'selected' : '' }}>EUGA OUARDIA</option>
                                                    <option value="EUGA MONASTIR"
                                                    {{ 'EUGA MONASTIR' == $information->euga ? 'selected' : '' }}>EUGA MONASTIR</option>
                                                    <option value="EUGA NABEUL"
                                                    {{ 'EUGA NABEUL' == $information->euga ? 'selected' : '' }}>EUGA NABEUL</option>
                                                    <option value="EUGA HOUMET SOUK"
                                                    {{ 'EUGA HOUMET SOUK' == $information->euga ? 'selected' : '' }}>EUGA HOUMET SOUK</option>
                                                    <option value="EUGA ETTADHAMEN"
                                                    {{ 'EUGA ETTADHAMEN' == $information->euga ? 'selected' : '' }}>EUGA ETTADHAMEN</option>
                                                    <option value="EUGA SOLIMAN"
                                                    {{ 'EUGA SOLIMAN' == $information->euga ? 'selected' : '' }}>EUGA SOLIMAN</option>



                                                </select>
                                            </div>

                                        </div>
                                    </div>






                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-default " href="{{ URL::to('/euga') }}">

                                        annuler
                                    </a>
                                </div>


                            </form>

                        </div>
                    @else
                        <div class="card">
                            <br><br>
                            <form action="/euga_recherche" method="POST">
                                <div class="row">
                                    @csrf


                                    <div class="col-4">
                                        Date de début:
                                        <input type="text" id="my_date_picker1" name="debut">
                                    </div>

                                    <div class="col-4">
                                        Date de fin:
                                        <input type="text" id="my_date_picker2" name="fin">

                                    </div>

                                    <div class= "col-4">
                                        <div class="form-group row">
                                            <label for="selection" class="col-sm-2 col-form-label">EUGA</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" id="selection" name="euga">
                                                    <option value="EUGA HACHED">EUGA HACHED</option>
                                                    <option value="EUGA RAOUED">EUGA RAOUED</option>
                                                    <option value="EUGA MEDENINE SUD">EUGA MEDENINE SUD</option>
                                                    <option value="EUGA BERGES DU LAC">EUGA BERGES DU LAC</option>
                                                    <option value="EUGA HRAIRIA">EUGA HRAIRIA</option>
                                                    <option value="EUGA BORJ_LOUZIR">EUGA BORJ_LOUZIR</option>
                                                    <option value="EUGA ARIANA">EUGA ARIANA</option>
                                                    <option value="EUGA SFAX NORD">EUGA SFAX NORD</option>
                                                    <option value="EUGA BIZERTE">EUGA BIZERTE</option>
                                                    <option value="EUGA ZAGHOUAN">EUGA ZAGHOUAN</option>
                                                    <option value="EUGA MOKNINE">EUGA MOKNINE</option>
                                                    <option value="EUGA TOZEUR">EUGA TOZEUR</option>
                                                    <option value="EUGA GROMBALIA">EUGA GROMBALIA</option>

                                                    <option value="EUGA KAIROUAN">EUGA KAIROUAN</option>
                                                    <option value="EUGA H LIF">EUGA H LIF</option>
                                                    <option value="EUGA ENFIDHA">EUGA ENFIDHA</option>
                                                    <option value="EUGA S.EL JADIDA">EUGA S.EL JADIDA</option>
                                                    <option value="EUGA DAR CHAABENE">EUGA DAR CHAABENE</option>
                                                    <option value="EUGA OUARDIA">EUGA OUARDIA</option>
                                                    <option value="EUGA MONASTIR">EUGA MONASTIR</option>
                                                    <option value="EUGA NABEUL">EUGA NABEUL</option>
                                                    <option value="EUGA HOUMET SOUK">EUGA HOUMET SOUK</option>
                                                    <option value="EUGA ETTADHAMEN">EUGA ETTADHAMEN</option>
                                                    <option value="EUGA SOLIMAN">EUGA SOLIMAN</option>


                                                </select>
                                            </div>

                                        </div>
                                    </div>






                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>



                            </form>

                        </div>
                        @endif
                    </div>
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered ">

                                    <tr>
                                        <th colspan ="10" style=" text-align: center;"> Statistiques</th>
                                    </tr>

                                    <tr>
                                        <th colspan="3" style=" text-align: center;">Reliquats non aiguillés</th>
                                        <th colspan="3" style=" text-align: center;">Reliquats à valider</th>
                                        <th rowspan="2" style=" text-align: center;">Reçu</th>
                                        <th colspan="3" style=" text-align: center;">Reliquats validés</th>

                                    </tr>
                                    <tr>


                                        <th style=" text-align: center;">Inf à 24h</th>
                                        <th style=" text-align: center;">Entre 24h et 48h</th>
                                        <th style=" text-align: center;">Sup à 48h</th>

                                        <th style=" text-align: center;">Inf à 24h</th>
                                        <th style=" text-align: center;">Entre 24h et 48h</th>
                                        <th style=" text-align: center;">Sup à 48h</th>





                                        <th style=" text-align: center;">Inf à 24h</th>
                                        <th style=" text-align: center;">Entre 24h et 48h</th>
                                        <th style=" text-align: center;">Sup à 48h</th>

                                    </tr>
                                    @if($test==1)
                                    <tr>

                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalinfo">{{$info}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalentreo">{{$entreo}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalsupo">{{$supo}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalinfr">{{$infr}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalentrer">{{$entrer}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalsupr">{{$supr}}</a></td>
                                        <td style=" text-align: center;">{{$tot}}</td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalinfc">{{$infc}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalentrec">{{$entrec}}</a></td>
                                        <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalsupc">{{$supc}}</a></td>

                                    </tr>
                                    @endif


                                </table>
                            </div>
                        </div>





                        <!-- /.card-body -->

            </div>








                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- /.container-fluid -->
    </div>
</section>

@if($test==1    )
    <x-adminlte-modal id="modalinfc" title="Liste des Incidents" size="xl" theme="secondary"
 v-centered static-backdrop scrollable >
<div style="height:800px;">

    <div class="card-body">
        <x-adminlte-datatable id="table3" :heads="$heads" striped hoverable>
            @foreach ($infclocs as $cl)
                <tr>


                    <td>{{ $cl->num }}</td>
                    <td>{{ $cl->WFID }}</td>
                    <td>{{ $cl->date_ouverture }}</td>
                    <td>{{ $cl->date_resolution }}</td>
                    <td>{{ $cl->date_cloture }}</td>
                    <td>{{ $cl->etat }}</td>
                    <td>{{ $cl->phase }}</td>
                    <td>{{ $cl->groupe_resolu }}</td>
                    <td>{{ $cl->groupe_cloture }}</td>
                    <td>{{ $cl->groupe_affectation }}</td>
                    <td>{{ $cl->zone }}</td>






                </tr>
            @endforeach
        </x-adminlte-datatable>

    </div>


</div>


<x-slot name="footerSlot">

    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
</x-slot>

</x-adminlte-modal>


<x-adminlte-modal id="modalentrec" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable>
    <div style="height:800px;">

        <div class="card-body">
            <x-adminlte-datatable id="table5" :heads="$heads" striped hoverable>
                @foreach ($entreclocs as $entrcloc)
                    <tr>
                        <td>{{ $entrcloc->num }}</td>
                        <td>{{ $entrcloc->WFID }}</td>
                        <td>{{ $entrcloc->date_ouverture }}</td>
                        <td>{{ $entrcloc->date_resolution }}</td>
                        <td>{{ $entrcloc->date_cloture }}</td>
                        <td>{{ $entrcloc->etat }}</td>
                        <td>{{ $entrcloc->phase }}</td>
                        <td>{{ $entrcloc->groupe_resolu }}</td>
                        <td>{{ $entrcloc->groupe_cloture }}</td>
                        <td>{{ $entrcloc->groupe_affectation }}</td>
                        <td>{{ $entrcloc->zone }}</td>

                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    <x-slot name="footerSlot">

        <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
    </x-slot>
    </x-adminlte-modal>



    <x-adminlte-modal id="modalsupc" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
        <div style="height:800px; ">

            <div class="card-body">
                <x-adminlte-datatable id="table6" :heads="$heads" striped hoverable>
                    @foreach ($supclocs as $supcloc)
                        <tr>
                            <td>{{ $supcloc->num }}</td>
                            <td>{{ $supcloc->WFID }}</td>
                            <td>{{ $supcloc->date_ouverture }}</td>
                            <td>{{ $supcloc->date_resolution }}</td>
                            <td>{{ $supcloc->date_cloture }}</td>
                            <td>{{ $supcloc->etat }}</td>
                            <td>{{ $supcloc->phase }}</td>
                            <td>{{ $supcloc->groupe_resolu }}</td>
                            <td>{{ $supcloc->groupe_cloture }}</td>
                            <td>{{ $supcloc->groupe_affectation }}</td>
                            <td>{{ $supcloc->zone }}</td>

                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
        <x-slot name="footerSlot">

            <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
        </x-slot>
        </x-adminlte-modal>

        <x-adminlte-modal id="modalinfr" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
            <div style="height:800px; ">

                <div class="card-body">
                    <x-adminlte-datatable id="table7" :heads="$heads" striped hoverable>
                        @foreach ($infrescs as $infresc)
                            <tr>
                                <td>{{ $infresc->num }}</td>
                                <td>{{ $infresc->WFID }}</td>
                                <td>{{ $infresc->date_ouverture }}</td>
                                <td>{{ $infresc->date_resolution }}</td>
                                <td>{{ $infresc->date_cloture }}</td>
                                <td>{{ $infresc->etat }}</td>
                                <td>{{ $infresc->phase }}</td>
                                <td>{{ $infresc->groupe_resolu }}</td>
                                <td>{{ $infresc->groupe_cloture }}</td>
                                <td>{{ $infresc->groupe_affectation }}</td>
                                <td>{{ $infresc->zone }}</td>

                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
            <x-slot name="footerSlot">

                <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
            </x-slot>
            </x-adminlte-modal>

            <x-adminlte-modal id="modalentrer" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
                <div style="height:800px; ">

                    <div class="card-body">
                        <x-adminlte-datatable id="table8" :heads="$heads" striped hoverable>
                            @foreach ($entrerescs as $entreresc)
                                <tr>
                                    <td>{{ $entreresc->num }}</td>
                                    <td>{{ $entreresc->WFID }}</td>
                                    <td>{{ $entreresc->date_ouverture }}</td>
                                    <td>{{ $entreresc->date_resolution }}</td>
                                    <td>{{ $entreresc->date_cloture }}</td>
                                    <td>{{ $entreresc->etat }}</td>
                                    <td>{{ $entreresc->phase }}</td>
                                    <td>{{ $entreresc->groupe_resolu }}</td>
                                    <td>{{ $entreresc->groupe_cloture }}</td>
                                    <td>{{ $entreresc->groupe_affectation }}</td>
                                    <td>{{ $entreresc->zone }}</td>

                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>
                <x-slot name="footerSlot">

                    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
                </x-slot>
                </x-adminlte-modal>

                <x-adminlte-modal id="modalsupr" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
                    <div style="height:800px; ">

                        <div class="card-body">
                            <x-adminlte-datatable id="table10" :heads="$heads" striped hoverable>
                                @foreach ($suprescs as $supresc)
                                    <tr>
                                        <td>{{ $supresc->num }}</td>
                                        <td>{{ $supresc->WFID }}</td>
                                        <td>{{ $supresc->date_ouverture }}</td>
                                        <td>{{ $supresc->date_resolution }}</td>
                                        <td>{{ $supresc->date_cloture }}</td>
                                        <td>{{ $supresc->etat }}</td>
                                        <td>{{ $supresc->phase }}</td>
                                        <td>{{ $supresc->groupe_resolu }}</td>
                                        <td>{{ $supresc->groupe_cloture }}</td>
                                        <td>{{ $supresc->groupe_affectation }}</td>
                                        <td>{{ $supresc->zone }}</td>

                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </div>
                    </div>
                    <x-slot name="footerSlot">

                        <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
                    </x-slot>
                    </x-adminlte-modal>


        <x-adminlte-modal id="modalinfo" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
            <div style="height:800px; ">

                <div class="card-body">
                    <x-adminlte-datatable id="table11" :heads="$heads" striped hoverable>
                        @foreach ($infouvcs as $infouvc)
                            <tr>
                                <td>{{ $infouvc->num}}</td>
                                <td>{{ $infouvc->WFID }}</td>
                                <td>{{ $infouvc->date_ouverture }}</td>
                                <td>{{ $infouvc->date_resolution }}</td>
                                <td>{{ $infouvc->date_cloture }}</td>
                                <td>{{ $infouvc->etat }}</td>
                                <td>{{ $infouvc->phase }}</td>
                                <td>{{ $infouvc->groupe_resolu }}</td>
                                <td>{{ $infouvc->groupe_cloture }}</td>
                                <td>{{ $infouvc->groupe_affectation }}</td>
                                <td>{{ $infouvc->zone }}</td>

                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
            <x-slot name="footerSlot">

                <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
            </x-slot>
            </x-adminlte-modal>


            <x-adminlte-modal id="modalentreo" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
                <div style="height:800px; ">

                    <div class="card-body">
                        <x-adminlte-datatable id="table12" :heads="$heads" striped hoverable>
                            @foreach ($entreouvcs as $entreouvc)
                                <tr>
                                    <td>{{ $entreouvc->num }}</td>
                                    <td>{{ $entreouvc->WFID }}</td>
                                    <td>{{ $entreouvc->date_ouverture }}</td>
                                    <td>{{ $entreouvc->date_resolution }}</td>
                                    <td>{{ $entreouvc->date_cloture }}</td>
                                    <td>{{ $entreouvc->etat }}</td>
                                    <td>{{ $entreouvc->phase }}</td>
                                    <td>{{ $entreouvc->groupe_resolu }}</td>
                                    <td>{{ $entreouvc->groupe_cloture }}</td>
                                    <td>{{ $entreouvc->groupe_affectation }}</td>
                                    <td>{{ $entreouvc->zone }}</td>

                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>
                <x-slot name="footerSlot">

                    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
                </x-slot>
                </x-adminlte-modal>



                <x-adminlte-modal id="modalsupo" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
                    <div style="height:800px; ">

                        <div class="card-body">
                            <x-adminlte-datatable id="table9" :heads="$heads" striped hoverable>
                                @foreach ($supouvcs as $supouvc)
                                    <tr>
                                        <td>{{ $supouvc->num }}</td>
                                        <td>{{ $supouvc->WFID }}</td>
                                        <td>{{ $supouvc->date_ouverture }}</td>
                                        <td>{{ $supouvc->date_resolution }}</td>
                                        <td>{{ $supouvc->date_cloture }}</td>
                                        <td>{{ $supouvc->etat }}</td>
                                        <td>{{ $supouvc->phase }}</td>
                                        <td>{{ $supouvc->groupe_resolu }}</td>
                                        <td>{{ $supouvc->groupe_cloture }}</td>
                                        <td>{{ $supouvc->groupe_affectation }}</td>
                                        <td>{{ $supouvc->zone }}</td>

                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </div>
                    </div>
                    <x-slot name="footerSlot">

                        <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
                    </x-slot>
                    </x-adminlte-modal>





@endif







@stop

@section('css')
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
    rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel=" icon" type="icon" href="vendor/adminlte/dist/img/logo_p.png" />



{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

<script>
    $(document).ready(function() {

$(function() {
    $("#my_date_picker1").
    datepicker({
        dateFormat: 'dd/mm/yy'
    });
});

$(function() {
    $("#my_date_picker2").
    datepicker({
        dateFormat: 'dd/mm/yy'
    });
});

$('#my_date_picker1').change(function() {
    startDate = $(this).
    datepicker('getDate');
    $("#my_date_picker2").
    datepicker("option", "minDate", startDate);
})

$('#my_date_picker2').change(function() {
    endDate = $(this).
    datepicker('getDate');
    $("#my_date_picker1").
    datepicker("option", "maxDate", endDate);
})


})
</script>
@stop
