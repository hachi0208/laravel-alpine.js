document.addEventListener("DOMContentLoaded", function () {
    let blogs = [];
    let nextPageUrl = "/api/blogs"; // 初期の API URL
    let loading = false;

    //apiへの処理
    function fetchBlogs(url) {
        if (!url || loading) return;
        loading = true;

        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                const newBlogs = data.data; // 新しく取得したブログのみを保持
                blogs.push(...newBlogs); // 新しいブログを既存の配列に追加
                nextPageUrl = data.next_page_url; // 次のページの URL を更新
                console.log(nextPageUrl);
                addBlogsToDOM(newBlogs); // 新しく取得したブログのみを DOM に追加
                loading = false;
                // ここでブログデータを DOM に追加する処理を記述
            })
            .catch((error) => console.error("Error:", error));
    }

    window.onscroll = function () {
        if (
            window.innerHeight + window.scrollY >= document.body.offsetHeight &&
            !loading
        ) {
            fetchBlogs(nextPageUrl); // 次のページのデータをロード
        }
    };

    fetchBlogs(nextPageUrl); // 初期データのロード
});

function addBlogsToDOM(blogs) {
    //どのhtmlのところに入れるかをみる。
    const container = document.getElementById("blog-container");

    blogs.forEach((blog) => {
        const blogElement = document.createElement("div");
        blogElement.className = "mb-4";
        blogElement.innerHTML = `
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-bold">${blog.title}</h2>
            <p>${
                blog.body.length > 100
                    ? blog.body.substring(0, 100) + "..."
                    : blog.body
            }</p>
            <a href="/blogs/${blog.id}" class="text-blue-500">続きを読む</a>
            <div class="mt-4">
                <p class="text-gray-600 text-sm">作成者: ${
                    blog.author.name ?? "不明"
                }</p>
                <p class="text-gray-600 text-sm">作成日: ${new Date(
                    blog.created_at
                ).toLocaleDateString("ja-JP")}</p>
            </div>
            <div class="mt-2">
                ${blog.tags
                    .map(
                        (tag) => `
                    <span class="custom-tag">
                        ${tag.tag_name}
                    </span>
                `
                    )
                    .join("")}
            </div>
        </div>
        `;

        //htmlに付け加える感じ
        container.appendChild(blogElement);
    });
}
