@extends('admin.layout')

@section('css')
<link href="{{{ asset('public/plugins/iCheck/all.css') }}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
  .autocomplete-suggestions{text-align:left;cursor:default;background:#fff;box-shadow:-1px 1px 5px rgba(0,0,0,.1);width:auto;border-radius:10px;position:absolute;display:none;z-index:9999;max-height:254px;overflow:hidden;overflow-y:auto;box-sizing:border-box}.autocomplete-suggestion span{width:87%;display:inline-block;padding:1px}.autocomplete-suggestion a{background-image:url(/public/img/searchbox_sprites312_hr.webp);background-size:20px;height:20px;width:20px;margin:2px;flex:1;float:right;background-position:bottom center}.autocomplete-suggestion{position:relative;padding-left:8px;line-height:27px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-size:1.18em;color:#333;border-radius:10px}.autocomplete-suggestion.selected{background:#f0f0f0}.modalsign_up{width:40%;cursor:pointer;display:inline-block;color:grey;margin:0 20px 10px 25px}  li.ui-menu-item {
    height: auto;
    background-color: #fff;
    border-bottom: 1px solid lavender;
}
li.ui-menu-item .ui-menu-item-wrapper {
    padding: 5px;
    line-height: 1em;
}
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            {{{ trans('admin.admin') }}}
            <a class="breadcrumblink" href="{{ url('panel/admin/subcategories/view').'/'.$data->categories_id}}">
              <i class="fa fa-angle-right margin-separator"></i>
                {{ $catname}}</a>
                <a class="breadcrumblink" href="/panel/admin/subcatimages/{{$data->id}}">
                  <i class="fa fa-angle-right margin-separator"></i>
                  {{ $data->name }} </a>
                    <i class="fa fa-angle-right margin-separator"></i>
                    Edit {{ $data->name }}
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">


          <div class="content">
        @if(Session::has('success_message'))
          <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}
        </div>
        @endif
        <span id="mess"></span>

         @if(Session::has('alert_message'))
          <div class="alert danger-success">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            <i class="fa fa-close margin-separator"></i> {{ Session::get('alert_message') }}
        </div>
        @endif
            <div class="row">

          <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Sub Category</h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

          @include('errors.errors-forms')



            
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status<br><p style="color:red; text-decoration-style: bold"> Be Cautious! </p></label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="mode" value="on" @if( $data->mode == 'on' ) checked @endif>
                         Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="mode" value="off" @if( $data->mode == 'off' ) checked @endif>
                          No
                        </label>
                      </div>
                      </div>
                    </div>

              
                    <div class="form-group">
                      <label class="col-sm-2 control-label">{{{ trans('admin.name') }}}</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $data->name }}" name="name"  class="form-control" placeholder="{{{ trans('admin.name') }}}">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2 control-label">{{{ trans('admin.slug') }}}</label>
                      <div class="col-sm-10"> 
                        <div class="form-group slug">
                          {{url('/')}}/s/
                          <input class="slugin" type="text" value="{{{ $data->slug }}}" name="slug"placeholder="{{{ trans('admin.slug') }}}">
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Meta Keywords</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{{ $data->metakeywords }}}" id="metakeywords" name="metakeywords" class="form-control" placeholder="Enter Meta keywords">
                      </div>
                    </div>
               

                    
                    <!-- Post Description -->
                
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Post Description</label>
                      <div class="col-sm-10">
                        <textarea name="spdescr" id="spdescr">{{{ $data->spdescr }}}</textarea>
                      </div>
                    </div>
                 
             
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Watermark<br></label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="watermark" value="light" @if( $data->watermark == 'light' ) checked @endif>
                         Light
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="watermark" value="bottom" @if( $data->watermark == 'bottom' ) checked @endif>
                          Bottom
                        </label>
                      </div>


                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="watermark" value="both" @if( $data->watermark == 'both' ) checked @endif>
                          Both
                        </label>
                      </div>

                       <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="watermark" value="no" @if( $data->watermark == 'no' ) checked @endif>
                          Off
                        </label>
                      </div>

                      </div>
                    </div>

                 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tags</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $data->tags }}" name="tags" class="form-control" placeholder="Enter Tags">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">SubGroups</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{{ $data->keyword }}}" name="keyword" id="keyword" class="form-control" placeholder="Enter keyword">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Select Group</label>
                      <div class="col-sm-6">
                          <select name="selectedgroup">
                          <option>--Select Subgroup--</option>
                          <?php 
                          $keywords = array_map('trim', explode(',', $data->keyword));
                           
                          foreach($keywords as $key){ ?>
                          <option <?php echo ($data->selectedgroup == $key)?"selected":"";?> value="{{$key}}">{{$key}}</option>
                          <?php } ?>
                          </select>
                      </div>
                    </div>

                 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">{{{ trans('admin.insta_username') }}}</label>
                      <div class="col-sm-10">
                        <input type="text" value="" name="search_insta_username" class="form-control" placeholder="Search Instagram Users">
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Instagram ID</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$data->insta_username}}" name="insta_username" class="form-control" placeholder="{{{ trans('admin.insta_username') }}}">
                      </div>
                    </div>
                    


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Pibthumb ?</label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="pinthumb" value="yes" @if( $data->pinthumb == 'yes' ) checked @endif>
                         Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="pinthumb" value="no" @if( $data->pinthumb == 'no' ) checked @endif>
                          No
                        </label>
                      </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Show at home?</label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="showathome" value="yes" @if( $data->showathome == 'yes' ) checked @endif>
                         Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="showathome" value="no" @if( $data->showathome == 'no' ) checked @endif>
                          No
                        </label>
                      </div>
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="col-sm-2 control-label">Upload All Insta Images<br><p style="color:red; text-decoration-style: bold"> Be Cautious! </p></label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="allinsta" value="yes" @if( $data->allinsta == 'yes' ) checked @endif>
                         Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="allinsta" value="no" @if( $data->allinsta == 'no' ) checked @endif>
                          No
                        </label>
                      </div>
                      </div>
                    </div>
                 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Daily Insta Cron<br></label>
                      <div class="col-sm-10">
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="instacronstatus" value="on" @if( $data->instacronstatus == 'on' ) checked @endif>
                         On
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="instacronstatus" value="off" @if( $data->instacronstatus == 'off' ) checked @endif>
                          Off
                        </label>
                      </div>
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Scrapped Images to be Pending?</label>
                      <div class="col-sm-10">
                        
                        <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="cronstatus" value="yes" @if( $data->cronstatus == 'yes' ) checked @endif>
                          Yes
                        </label>
                      </div>
                      
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="cronstatus" value="no" @if( $data->cronstatus == 'no' ) checked @endif>
                          No
                        </label>
                      </div>
                      
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label class="col-sm-2 control-label">IMG Title</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$data->imgtitle}}" name="imgtitle" class="form-control" placeholder="IMG Title">
                      </div>
                    </div>
                 
                  <?php
                  $d = $data->special_date;
                  if( $d != "" )
                  {
                    $d = date("d-m-Y", strtotime($d));
                  }
                  ?>
                 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Occation/Fesitval Date</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$d}}" name="special_date" class="form-control" placeholder="Occation/Fesitval Date">
                      </div>
                    </div>
                 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">{{ trans('admin.thumbnail') }} ({{trans('misc.optional')}})</label>
                      <div class="col-sm-10">
                        <div class="btn-info box-file">
                          <input type="file" accept="image/*" name="thumbnail" />
                        
                        </div>
                        <input type="hidden" name="instathumbnail" />
                        <p class="help-block">{{ trans('admin.thumbnail_desc') }}</p>
                       
                        <div class="thumbfilename">
                          <i class="glyphicon glyphicon-paperclip myicon-right"></i>
                          <p>{{ $data->sthumbnail }}</p>
                       </div>

                      </div>
                    </div>
                  

                    <a href="{{{ url('panel/admin/categories') }}}" class="btn btn-default">{{{ trans('admin.cancel') }}}</a>
                    <button type="submit" class="btn btn-success pull-right">{{{ trans('admin.save') }}}</button>
                  
                </form>
              </div>
            </div><!-- /.row -->
          </div><!-- /.content -->
          <!-- Your Page Content Here -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection
@section('javascript')

  <!-- icheck -->
  <script src="{{{ asset('public/plugins/iCheck/icheck.min.js') }}}" type="text/javascript"></script>
  <script src="{{{ asset('public/Trumbowyg-master/dist/trumbowyg.min.js') }}}"></script>
  <script src="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
     var insta_data = [];

     function slugify(text) {
      const from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;"
      const to = "aaaaaeeeeeiiiiooooouuuunc------"

      const newText = text.split('').map(
        (letter, i) => letter.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i)))

      return newText
        .toString()                     // Cast to string
        .toLowerCase()                  // Convert the string to lowercase letters
        .trim()                         // Remove whitespace from both sides of a string
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/&/g, '-y-')           // Replace & with 'and'
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-');        // Replace multiple - with single -
    }

    function myFunction() 
    {
      var copyText = document.getElementById("searchtag");
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      document.execCommand("copy");
    }

    $(document).ready(function()
    {
      $("#special_date").datepicker({
        dateFormat: 'dd-mm-yy'
      });

      $("input[name='search_insta_username']").autocomplete({
          source: function(request, response) {
              var dt = new Date().getTime();
              var q = request.term;
              $.get(URL_BASE+"/ajax/searchinsta?index="+dt+"&q="+q, function(data){
              if ( data ) {
                  if( data.error == 1 ) {
                    return false;
                  }
                  if( data.index == dt )
                  {
                    insta_data = data.insta_data;
                    response(data.data);
                  }
              }
          });
        },       
        minLength: 2,
        open: function( event, ui )
        {
          $("ul.ui-autocomplete").find(".ui-menu-item").each(function()
          {
              var username = $(this).text();
              var obj = insta_data[username];
              var status = (obj.is_verified == false) ? "notverified" : "verified";
              status += (obj.is_private == false) ? "-public" : "-private";
              var t = "<span style='border:1px solid grey;float:left;' class='instaimg'><img style='width:60px;height:60px;margin:2px;' src='"+obj.profile_pic_url+"'/></span><span style='margin-left:10px;float:left;'><b>Full Name :</b>"+obj.full_name+"<br/><b>Username :</b>"+$(this).text().trim()+"<br/><b> Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>"+status+"</span>";
              $(this).html(t);
          });
        },
        select: function( event, ui ) 
        {
          $("input[name='search_insta_username']").val(ui.item.value.trim());
          $( "input[name='search_insta_username']" ).autocomplete( "close" );
          console.log(insta_data[ui.item.value]);
          var obj = insta_data[ui.item.value];
          $("input[name='instathumbnail']").val(obj.profile_pic_url);
          $("input[name='insta_username']").val(obj.pk);
          $("input[name='name']").val(obj.full_name);
          $("input[name='imgtitle']").val(obj.full_name);
          $("input[name='slug']").val(obj.str.slug);
          var copykeyword = $("#copykeyword").val();
          copykeyword1 = copykeyword.replace(/abc/g, obj.full_name);
          $("#copykeyword").val(copykeyword1);
         
        }
      });

      $("input[name='name']").on('keypress blur change', function(e)
      {
        var title = $(this).val();
        var t = title.split(" ");
        if( t.length > 2 ) 
        {
          name = t[0]+" "+t[1];
          var spdescr = $("#spdescr").val();
          spdescr1 = spdescr.replace(/abc/g, name);
          $("#spdescr").val(spdescr1);
        }
      
        var title = $(this).val();
        var slug = slugify(title);
        $("#slug").val(slug);

        var t = title.split(" ");
        if( t.length > 5 ) 
        {
          name = t[0]+" "+t[1]+" "+t[2]+" "+t[3]+" "+t[4];
          console.log(name);
          
          var imgtitle = $("#imgtitle").val();
          $("#imgtitle").val(name);
        }
        else
        {
          name = t[0]+" "+t[1];
          var imgtitle = $("#imgtitle").val();
          $("#imgtitle").val(name);
        }

      });

  
        var res = new Array();
        var searchdata = JSON.parse('<?php echo addslashes(json_encode($alltags));?>');
        for (var key in searchdata) {
          if (searchdata.hasOwnProperty(key)) {
            res.push(searchdata[key]);
          }
        }

        demo1 = new autoComplete({
        selector:"#searchtag",
        minChars:3,
        source: function(term, suggest){
            term = term.toLowerCase();
            var matches = [];
            for (i=0; i<res.length; i++)
                if (~res[i].toLowerCase().indexOf(term)) matches.push(res[i].toUpperCase());
            suggest(matches);
            $(".autocomplete-suggestion span").click(function(e)
            {
                $("#searchtag").val($(this).html());
                e.preventDefault();
                $("div.autocomplete-suggestions").hide()
                myFunction();    
            });

          },
          onSelect: function(e, term)
          {
            e.preventDefault();
            myFunction();     
          }
        });
    });

    $(function() 
    {
      $('#spdescr').trumbowyg();
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.     
      });

      $('input[type="radio"]').iCheck({
        radioClass: 'iradio_flat-red'
      });

      function replaceString(string) {
        return string.replace(/[\-\_\.\+]/ig,' ')
      }

      $('input[type="file"]').attr('title', window.URL ? ' ' : '');

      $("#keyword").tagsInput({
        'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
        'width':'auto',
        'height':'auto',
        'removeWithBackspace' : true,
        'minChars' : 2,
        'maxChars' : 5500,
        'defaultText':'{{ trans("misc.add_tag") }}',
        onChange: function() 
        {
          var input = $(this).siblings('.tagsinput');
          if( input.children('span.tag').length >= 20000){
              input.children('div').hide();
          } else {
            input.children('div').show();
          }
        },
      });
 
</script>
 @include('admin.topbottom')
<link rel="stylesheet" href="{{{ asset('public/Trumbowyg-master/dist/ui/trumbowyg.min.css') }}}">
 @include('admin.topbottom')
@endsection
