<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>
<div class="dropdown ">
  <div class="dropdown-trigger">
    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu2">
      <span>Content</span>
      <span class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </button>
  </div>
  <div class="dropdown-menu" id="dropdown-menu2" role="menu">
    <div class="dropdown-content">
      <div class="dropdown-item">
        <p>You can insert <strong>any type of content</strong> within the dropdown menu.</p>
      </div>
      <hr class="dropdown-divider">
      <div class="dropdown-item">
        <p>You simply need to use a <code>&lt;div&gt;</code> instead.</p>
      </div>
      <hr class="dropdown-divider">
      <a href="#" class="dropdown-item">
        This is a link
      </a>
    </div>
  </div>
</div>
</body>
</html>