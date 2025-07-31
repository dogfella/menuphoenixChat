<?php
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '/app_init.php');
require_once($_SERVER["DOCUMENT_ROOT"] . MEMKIT_ADM_FOLDER . 'lib/init.php');
require_once get_appinfo('path') . 'layouts/include_with_variables.php';
//include '../../../../libapp/parsedown/vendor/autoload.php';
include '../../../../libapp/parsedown_extra/vendor/autoload.php';
?>
<link rel="stylesheet" href="<?php echo get_appinfo('url'); ?>/assets/plugins/prism-custom/prism-custom-rp.css">

<div class="pc-content">
  <div id="top"></div>
    <?php includeFileWithVariables(get_appinfo('path') . 'layouts/breadcrumb_weather.php', array('title' => 'ChatGPT', 'pagetitle' => 'New Navigation Class for Phoenix BS5 Template'));

    $markdownFile ='markdown_geniune_chatGPT_navigation_chatgptdemo_2025_july_28_w_anchors.md';

      if (!file_exists($markdownFile)) {
        echo "Error: Markdown file not found.";

      } else {
          // output markdown to $htmlOutput object
          $markdownContent = file_get_contents($markdownFile);
          $Parsedown = new Parsedown();
          $htmlOutput = $Parsedown->text($markdownContent);

      ?>
        <div class="row">
          <!-- Begin Col left -->
          <div class="col-12 col-xl-9">
            <div class="card p-4">
              <div class="card-body">
                <h2>ChatGPT Conversation - started July 28, 2025</h2>
                <?php  echo $htmlOutput;  ?>
              </div>
              <!-- End card body -->
            </div>
          </div>

          <!-- Begin Col Right -->
          <div class="col-12 col-xl-3">
            <div class="position-sticky mt-xl-4" style="top: 30px;">
              <div class="card">
                <div class="card-body">
                  <h5 class="lh-1">Topics on this page </h5>
                  <hr>
                  <ul id="sticky-right-anchor-nav" class="nav nav-vertical flex-column doc-nav" data-doc-nav="data-doc-nav">
                    <li class="nav-item"> <a class="nav-link" href="#topic1"><i
                          class="ti ti-chevrons-right">&nbsp;</i>Topic1</a>
                    </li>
                  </ul>
                </div>
                <!-- end card-body -->
              </div>
              <!-- end card -->
            </div>
            <!-- end position-sticky -->
          </div>
          <!-- end col-xl-3 -->
          <?php
      }
        ?>

    </div>
    <!-- end card card-body -->
  </div>
  <!-- end card -->
</div>
<!-- End pc-content -->

<button id="backToTopBtn" class="btn btn-secondary"
  style="position: fixed; bottom: 20px; right: 20px; z-index: 1030; display: none;">
  ↑ Back to Top
</button>

<script type="text/javascript">
pageSetUp();
// pagefunction
var pagefunction = function() {

    const btn = document.getElementById("backToTopBtn");

    // Show the button after scrolling down a bit
    window.addEventListener("scroll", function() {
      if (window.scrollY > 300) {
        btn.style.display = "block";
      } else {
        btn.style.display = "none";
      }
    });

    // Scroll to top smoothly when clicked
    btn.addEventListener("click", function() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });


    const navList = document.getElementById('sticky-right-anchor-nav');
    const anchors = document.querySelectorAll('.menu-anchor');

    anchors.forEach(anchor => {
      const id = anchor.id;
      if (!id) return;

      // Extract heading text (first <h2> or <h3> inside the anchor block)
      const heading = anchor.querySelector('h1, h2, h3, h4, h5, h6');
      const label = heading ? heading.textContent.trim() : id;

      const li = document.createElement('li');
      li.className = 'nav-item';

      const a = document.createElement('a');
      a.className = 'nav-link';
      a.textContent = label;
      a.href = 'javascript:void(0)';
      a.dataset.scrollTarget = id;

      a.addEventListener('click', function() {
        const target = document.getElementById(this.dataset.scrollTarget);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });

      li.appendChild(a);
      navList.appendChild(li);
    });

}; // end pagefunction

loadScript("<?php echo get_appinfo('url'); ?>/assets/plugins/prism-custom/prism-custom-rp.js", pagefunction);

</script>