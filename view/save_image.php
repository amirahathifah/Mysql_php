<form action="<?= site_url('etest/question/save_image') ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="text" name="hide" value="bismillah">

  <input type="file" name="file[]" id="file" multiple>
  <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
  <button type="submit" name="submit">UPLOAD</button>
</form>
