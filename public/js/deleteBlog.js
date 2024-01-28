/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/deleteBlog.js ***!
  \************************************/
document.addEventListener("alpine:init", function () {
  Alpine.data("blogManager", function () {
    return {
      // 削除を行う関数
      deleteBlog: function deleteBlog(blogId) {
        if (!confirm("このブログを削除してもよろしいですか？")) {
          return;
        }

        // CSRFトークンの取得（Laravelのため）
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        fetch("/api/blogs/".concat(blogId), {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token
          }
        }).then(function (response) {
          if (!response.ok) {
            throw new Error("削除に失敗しました");
          }
          return response.json();
        }).then(function (data) {
          // 削除成功時の処理
          // DOMから該当するブログエントリーを削除
          document.getElementById("article-".concat(blogId)).remove();
        })["catch"](function (error) {
          return console.error("Error:", error);
        });
      }
    };
  });
});
/******/ })()
;