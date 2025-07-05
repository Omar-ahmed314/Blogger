import Image from "next/image";
import Post from "./components/post";
export default function Home() {
    return (
        <main className="max-w-5xl mx-auto px-4 flex flex-col md:flex-row ">
            <section
                id="wrapper"
                className="dark:border-gray-800 md:border-r-1 py-8 flex-2/3"
            >
                <section id="posts-container">
                    <Post />
                </section>
            </section>
            <section id="hightlights" className="px-4 py-8 flex-1/3">
                <h2 className="text-3xl font-bold mb-4 dark:text-white">
                    Highlights
                </h2>
            </section>
        </main>
    );
}
