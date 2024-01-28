document.addEventListener("alpine:init", () => {
    Alpine.data("blogManager", () => ({
        // 削除を行う関数
        deleteBlog(blogId) {
            if (!confirm("このブログを削除してもよろしいですか？")) {
                return;
            }

            // CSRFトークンの取得（Laravelのため）
            const token = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            fetch(`/api/blogs/${blogId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token,
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("削除に失敗しました");
                    }
                    return response.json();
                })
                .then((data) => {
                    // 削除成功時の処理
                    // DOMから該当するブログエントリーを削除
                    document.getElementById(`article-${blogId}`).remove();
                })
                .catch((error) => console.error("Error:", error));
        },
    }));
});
