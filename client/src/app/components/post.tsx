export default function Post() {
    return (
        <section id="post-container">
            <div id="post" className="p-4 h-50 dark:bg-amber-600">
                <div className="flex items-center gap-2 mb-4">
                    <div className="w-8 h-8 bg-amber-50 rounded-full"></div>
                    <div className="flex gap-2 items-baseline">
                        <span className="text-gray-700 dark:text-gray-400">
                            @Username
                        </span>
                        <span className="text-gray-500 dark:text-gray-400 text-sm">
                            2 hours ago
                        </span>
                    </div>
                </div>
                <h2 className="dark:text-white text-2xl">Tile of the post</h2>
                <p className="text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </section>
    );
}
