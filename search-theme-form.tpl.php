<div id="search" class="container-inline">
  <?php $search['search_theme_form'] = '<div class="form-item" id="edit-search-theme-form-wrapper"><input type="text" maxlength="128" name="search_theme_form" id="edit-search-theme-form-1" size="35" value="' . t('SEARCH...') . '" title="' . t('Masukkan kata kunci.') . '" onblur="this.value=this.value||this.defaultValue; this.style.color = \'#CCC\';" onfocus="this.value=\'\'; this.style.color = \'#000\';" class="form-text default-value" /></div>'; ?>
  <?php print $search['search_theme_form']; ?>
  <?php print $search['submit']; ?>
  <?php print $search['hidden']; ?>
</div>