<style>
.galery img{
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    opacity: 85%;
}
.bg-skyblue {
    background-color: #a6b9ef;
}
.bg-nofile {
    height: 400px;
    width: 100%;
    background-image: url(<?= base_url('assets/oes/') ?>images/bg4.png);
    background-repeat: no-repeat;
    background-position: center; 
}
</style>
<form action="<?= site_url('etest/question/save_image_aws') ?>" method="post" enctype="multipart/form-data">
    <div class="col-md-12 text-center mb-3">
        <label class="btn btn-danger rounded m-0" for="file_name"><i class="fa fa-upload"></i>Choose image to upload</label>
        <input type="file" accept="image/*" name="file_name[]" id="file_name" class="inputfile" multiple />
        <button type="submit" name="submit" class="btn btn-primary rounded">Create</button>
    </div>
    <div class="col-md-12">
        <div id="nofile" class="bg-nofile"></div>
        <div class="row" id="image_preview">

        </div>
    </div>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <input type="hidden" id="removed_files" name="removed_files" value="" />
</form>
<script>
window.newFileList = [];
var file_name = document.getElementById("file_name");
file_name.style.display = "none";

$(document).on('click', '.btnRemove', function () {

  var remove_element = $(this);
  var id = remove_element.val();
  remove_element.closest('.appendedImg').remove();
  var input = document.getElementById('file_name');
  var files = input.files;

  if (files.length) 
  {
    if (typeof files[id] !== 'undefined') 
    {
       window.newFileList.push(files[id].name)
    }
  }
  document.getElementById('removed_files').value = JSON.stringify(window.newFileList);
});

$(document).on('change', '#file_name', function (event) {
    var total_file = document.getElementById("file_name").files.length;
    var nofile = document.getElementById("nofile");

    nofile.style.display = "none";

    for (var i = 0; i < total_file; i++) 
    {
        $('#image_preview').append("<div class='col-md-2 margin-top10 appendedImg galery'><img style='width: 100%; height: 130px; object-fit: cover;' src='" + URL.createObjectURL(event.target.files[i]) + "'><button class='btn btn-block btn-danger margin-top5 btnRemove' value='" + i + "'>Remove</button></div>");
    }
});
</script>
