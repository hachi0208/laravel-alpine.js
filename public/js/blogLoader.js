/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/blogLoader.js ***!
  \************************************/
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
document.addEventListener("DOMContentLoaded", function () {
  var blogs = [];
  var nextPageUrl = "/api/blogs"; // 初期の API URL
  var loading = false;

  //apiへの処理
  function fetchBlogs(url) {
    if (!url || loading) return;
    loading = true;
    fetch(url).then(function (response) {
      return response.json();
    }).then(function (data) {
      console.log(data);
      var newBlogs = data.data; // 新しく取得したブログのみを保持
      blogs.push.apply(blogs, _toConsumableArray(newBlogs)); // 新しいブログを既存の配列に追加
      nextPageUrl = data.next_page_url; // 次のページの URL を更新
      console.log(nextPageUrl);
      addBlogsToDOM(newBlogs); // 新しく取得したブログのみを DOM に追加
      loading = false;
      // ここでブログデータを DOM に追加する処理を記述
    })["catch"](function (error) {
      return console.error("Error:", error);
    });
  }
  window.onscroll = function () {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight && !loading) {
      fetchBlogs(nextPageUrl); // 次のページのデータをロード
    }
  };
  fetchBlogs(nextPageUrl); // 初期データのロード
});
function addBlogsToDOM(blogs) {
  //どのhtmlのところに入れるかをみる。
  var container = document.getElementById("blog-container");
  blogs.forEach(function (blog) {
    var _blog$author$name;
    var blogElement = document.createElement("div");
    blogElement.className = "mb-4";
    blogElement.innerHTML = "\n        <div class=\"bg-white shadow-lg rounded-lg p-6\">\n            <h2 class=\"text-xl font-bold\">".concat(blog.title, "</h2>\n            <p>").concat(blog.body.length > 100 ? blog.body.substring(0, 100) + "..." : blog.body, "</p>\n            <a href=\"/blogs/").concat(blog.id, "\" class=\"text-blue-500\">\u7D9A\u304D\u3092\u8AAD\u3080</a>\n            <div class=\"mt-4\">\n                <p class=\"text-gray-600 text-sm\">\u4F5C\u6210\u8005: ").concat((_blog$author$name = blog.author.name) !== null && _blog$author$name !== void 0 ? _blog$author$name : "不明", "</p>\n                <p class=\"text-gray-600 text-sm\">\u4F5C\u6210\u65E5: ").concat(new Date(blog.created_at).toLocaleDateString("ja-JP"), "</p>\n            </div>\n            <div class=\"mt-2\">\n                ").concat(blog.tags.map(function (tag) {
      return "\n                    <span class=\"custom-tag\">\n                        ".concat(tag.tag_name, "\n                    </span>\n                ");
    }).join(""), "\n            </div>\n        </div>\n        ");

    //htmlに付け加える感じ
    container.appendChild(blogElement);
  });
}
/******/ })()
;