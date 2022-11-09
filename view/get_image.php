<style>
#galery img{
    min-width: 70px;
    min-height: 70px;
    max-width: 70px;
    max-height: 70px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    opacity: 85%;
}
.bg-skyblue {
    background-color: #a6b9ef;
}
.rounded-pill {
    border-radius: 50rem !important;
}
.bg-nofile {
    height: 400px;
    width: 100%;
    background-image: url(<?= base_url('assets/oes/') ?>images/bg4.png);
    background-repeat: no-repeat;
    background-position: center; 
}
</style>
<form method="post" enctype="multipart/form-data" action="upload.php">
    <div class="text-center mb-2">
        <label for="image" class="btn btn-lg btn-primary rounded px-lg-5">Muat Naik Imej</label><br/>
        <input type="file" id="image" onchange="previewMultiple(event)" multiple>
    </div>

    <div class="row justify-content-md-center">
        <div id="nofile" class="bg-nofile"></div>
        <div id="display_all" class="col-sm-8"></div>
    </div>

    <div class="row justify-content-md-center">
        <button type="button" class="btn btn-primary rounded" onclick="simpan()"><i class="fa fa-folder"></i>Simpan</button>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var save = document.getElementById("save");
    var image = document.getElementById("image");
    save.style.display = "none";
    image.style.display = "none";
    var datafile = [];

    function previewMultiple(event){
        var images = document.getElementById("image");
        var nofile = document.getElementById("nofile");
        
        var files_length = images.files.length;
        nofile.style.display = "none";
        save.style.display = "block";

        for(i = 0; i < files_length; i++)
        {
            var urls = URL.createObjectURL(event.target.files[i]);
            var filename = event.target.files[i].name;
            var length = event.target.files.length;
            var type = event.target.files[i].type;
            var size = event.target.files[i].size;
            var size_kb = size/1024;
            var size_2decimal = size_kb.toFixed(2);
            var event_target = event.target.files;

            document.querySelector('#display_all').insertAdjacentHTML(
                'afterbegin',
                `<div class="row mb-3 align-items-center template">
                    <div id="galery" class="col-sm-1 mr-4">
                        <img src="`+urls+`">
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="font-weight-bold text-secondary">`+filename+`</div>
                                <div class="text-muted">`+size_2decimal+`KB</div>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-sm delete" value="`+filename+`">
                                    <i class="fa fa-times fa-2x text-warning"></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-skyblue rounded p-1 mt-1 mr-3"></div>
                    </div>
                </div>`,    
            )

            var param = {
                ib_desc: filename,
                lex_id: 1,
                lsx_id: 1,
                urr_id: 1
            };
            datafile.push(param);
        }

        $("button").click(function() {
            var selected_filename = $(this).val();

            let j = datafile.findIndex(data => data.ib_name === selected_filename);
            if (j !== -1) 
            {
                datafile.splice(j, 1);
            }
        });

        $(document).on('click', '.delete', function (event) {
            var target = $(event.target),row = target.closest('.template');
            row.remove();
        });
    }

    function simpan() {
        // console.log(datafile);
        $.ajax({
            url: "<?= site_url('etest/question/get_image') ?>",
            data: { data: datafile},
            dataType:'json',
            type:'POST',
            success: function(response) {
                if (response.status == true) {
                }
            }
        });
    }
</script>
