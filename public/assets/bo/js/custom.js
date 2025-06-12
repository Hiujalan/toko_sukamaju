/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
// SWEET ALERT
const SweetAlert = (function () {
  //
  // Setup module components
  //

  // Sweet Alerts
  const _componentSweetAlert = function () {
    if (typeof Swal == "undefined") {
      console.warn("Warning - sweet_alert.min.js is not loaded.");
      return;
    }

    //
    // Contextual alerts
    //

    // Warning Delete alert
    const swalErrorElementCustom = document.querySelector("#sweet_error_custom");
    if (swalErrorElementCustom) {
      var errorMessage = $("#sweet_error_custom").data("message");
      Swal.fire({
        title: "Gagal!!",
        text: errorMessage,
        icon: "error",
      });
    }

    const swalSuccessElementCustom = document.querySelector("#sweet_success_custom");
    if (swalSuccessElementCustom) {
      var successMessage = $("#sweet_success_custom").data("message");
      Swal.fire({
        title: "Berhasil!",
        text: successMessage,
        icon: "success",
      });
    }

    $(document).on("click", ".sweet_warning_custom", function (event) {
      event.preventDefault();
      const url = $(this).data("url");

      Swal.fire({
        title: "Apa anda yakin?",
        text: "Data akan hilang secara permanen!!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Lanjutkan",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    });
  };

  //
  // Return objects assigned to module
  //

  return {
    initComponents: function () {
      _componentSweetAlert();
    },
  };
})();

// DATATABLES
const DataTables = (function () {
  //
  // Setup module components
  //

  // Initialize all DataTables
  const _componentDataTables = function () {
    if (typeof DataTable === "undefined") {
      console.warn("Warning - DataTables library is not loaded.");
      return;
    }

    document.querySelectorAll(".datatable-init").forEach(function (table) {
      const columnCount = table.querySelectorAll("thead th").length;

      new DataTable(table, {
        columns: Array.from({ length: columnCount }, () => ({})),
      });
    });

    // Basic DataTable
    new DataTable("#example");

    // Vertical scroll
    new DataTable("#scroll-vertical", {
      scrollY: "210px",
      scrollCollapse: true,
      paging: false,
    });

    // Horizontal scroll
    new DataTable("#scroll-horizontal", {
      scrollX: true,
    });

    // Alternative pagination
    new DataTable("#alternative-pagination", {
      pagingType: "full_numbers",
    });

    // Fixed header
    new DataTable("#fixed-header", {
      fixedHeader: true,
    });

    // Responsive modal
    new DataTable("#model-datatables", {
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              const data = row.data();
              return "Details for " + data[0] + " " + data[1];
            },
          }),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table",
          }),
        },
      },
    });

    // Buttons
    new DataTable("#buttons-datatables", {
      dom: "Bfrtip",
      buttons: ["copy", "csv", "excel", "print", "pdf"],
    });

    // Ajax data
    new DataTable("#ajax-datatables", {
      ajax: "assets/json/datatable.json",
    });

    // Add rows dynamically
    const tableAddRows = $("#add-rows").DataTable();
    let rowIndex = 1;

    $("#addRow").on("click", function () {
      tableAddRows.row
        .add([rowIndex + ".1", rowIndex + ".2", rowIndex + ".3", rowIndex + ".4", rowIndex + ".5", rowIndex + ".6", rowIndex + ".7", rowIndex + ".8", rowIndex + ".9", rowIndex + ".10", rowIndex + ".11", rowIndex + ".12"])
        .draw(false);
      rowIndex++;
    });

    // Trigger initial row
    $("#addRow").trigger("click");
  };

  //
  // Return public methods
  //
  return {
    initComponents: function () {
      _componentDataTables();
    },
  };
})();

// SELECT2
const Select2Component = (function () {
  //
  // Private function for custom state format
  //
  const _formatState = function (e) {
    if (!e.id) return e.text;

    const $state = $('<span><img class="img-flag rounded" height="18" /> <span></span></span>');
    $state.find("span").text(e.text);
    $state.find("img").attr("src", "assets/images/flags/select2/" + e.element.value.toLowerCase() + ".png");

    return $state;
  };

  //
  // Initialize all Select2 variants
  //
  const _initSelect2 = function () {
    if (typeof $.fn.select2 === "undefined") {
      console.warn("Warning - select2.min.js is not loaded.");
      return;
    }

    $(".select-search").select2({
      minimumResultsForSearch: 0,
    });

    // Basic
    $(".js-example-basic-single").select2();
    $(".js-example-basic-multiple").select2();

    // Data array
    $(".js-example-data-array").select2({
      data: [
        { id: 0, text: "enhancement" },
        { id: 1, text: "bug" },
        { id: 2, text: "duplicate" },
        { id: 3, text: "invalid" },
        { id: 4, text: "wontfix" },
      ],
    });

    // With templating for result
    $(".js-example-templating").select2({
      templateResult: _formatState,
    });

    // With templating for selected item
    $(".select-flag-templating").select2({
      templateSelection: _formatState,
    });

    // Disabled examples
    $(".js-example-disabled").select2();
    $(".js-example-disabled-multi").select2();

    // Enable/disable programmatically
    $(".js-programmatic-enable").on("click", function () {
      $(".js-example-disabled").prop("disabled", false);
      $(".js-example-disabled-multi").prop("disabled", false);
    });

    $(".js-programmatic-disable").on("click", function () {
      $(".js-example-disabled").prop("disabled", true);
      $(".js-example-disabled-multi").prop("disabled", true);
    });
  };

  //
  // Public API
  //
  return {
    initComponents: function () {
      _initSelect2();
    },
  };
})();

// CKEDITOR
const EditorComponent = (function () {
  //
  // CKEditor Classic
  //
  const _initClassicEditor = function () {
    const editors = document.querySelectorAll(".ckeditor-classic");

    if (typeof ClassicEditor === "undefined") {
      console.warn("Warning - ClassicEditor is not loaded.");
      return;
    }

    editors.forEach(function (el) {
      ClassicEditor.create(el)
        .then(function (editor) {
          editor.ui.view.editable.element.style.height = "200px";
        })
        .catch(function (err) {
          console.error("CKEditor error:", err);
        });
    });
  };

  //
  // Quill Snow Editor
  //
  const _initSnowEditor = function () {
    const editors = document.querySelectorAll(".snow-editor");

    if (typeof Quill === "undefined") {
      console.warn("Warning - Quill.js is not loaded.");
      return;
    }

    editors.forEach(function (el) {
      const options = {
        theme: "snow",
        modules: {
          toolbar: [
            [{ font: [] }, { size: [] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script: "super" }, { script: "sub" }],
            [{ header: [false, 1, 2, 3, 4, 5, 6] }, "blockquote", "code-block"],
            [{ list: "ordered" }, { list: "bullet" }, { indent: "-1" }, { indent: "+1" }],
            ["direction", { align: [] }],
            ["link", "image", "video"],
            ["clean"],
          ],
        },
      };

      new Quill(el, options);
    });
  };

  //
  // Quill Bubble Editor
  //
  const _initBubbleEditor = function () {
    const editors = document.querySelectorAll(".bubble-editor");

    if (typeof Quill === "undefined") {
      console.warn("Warning - Quill.js is not loaded.");
      return;
    }

    editors.forEach(function (el) {
      const options = {
        theme: "bubble",
      };

      new Quill(el, options);
    });
  };

  //
  // Public method to init all
  //
  return {
    initComponents: function () {
      _initClassicEditor();
      _initSnowEditor();
      _initBubbleEditor();
    },
  };
})();

// FILE UPLOAD
const FileUploaderComponent = (function () {
  //
  // FilePond initialization
  //
  const _initFilePond = function () {
    if (typeof FilePond === "undefined") {
      console.warn("Warning - FilePond is not loaded.");
      return;
    }

    // Register plugins (only once globally)
    FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageExifOrientation, FilePondPluginImagePreview, FilePondPluginFileValidateType);

    const filePondOptionsImage = {
      acceptedFileTypes: ["image/jpeg", "image/jpg", "image/png"],
      labelFileTypeNotAllowed: "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.",
      fileValidateTypeLabelExpectedTypes: "File harus berupa: JPG, JPEG, PNG",
    };

    // Init FilePond for multiple inputs
    const multipleInputs = document.querySelectorAll("input.filepond-input-multiple");
    multipleInputs.forEach(function (el) {
      FilePond.create(el, filePondOptionsImage);
      // FilePond.create(el);
    });

    // Init FilePond with circle style
    const circleInput = document.querySelector(".filepond-input-circle");
    if (circleInput) {
      FilePond.create(circleInput, {
        labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 170,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
      });
    }
  };

  //
  // Public method to initialize all components
  //
  return {
    initComponents: function () {
      _initFilePond();
    },
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  SweetAlert.initComponents();
  DataTables.initComponents();
  Select2Component.initComponents();
  EditorComponent.initComponents();
  FileUploaderComponent.initComponents();
});
