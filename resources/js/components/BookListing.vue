<template>
    <div class="w-full primary-text">
        <div class="bg-gray-800 pt-8 pb-20">
            <!-- Header Section -->
            <div class="w-9/12 text-center mr-auto ml-auto -mt-0 mb-0">
                <h1 class="text-orange text-5xl p-10">Book Shop</h1>
                <p class="w-9/12 mr-auto ml-auto -mt-0 mb-0 text-white">Cupcake ipsum dolor sit amet croissant. I love topping candy canes sweet roll croissant caramels. Soufflé macaroon liquorice chocolate tart I love.</p>
            </div>
        </div>

        <!-- Search Box and Table Section -->
        <div class="w-full flex justify-center mt-6">
            <div class="w-[1220px]">
                <!-- Search Box -->
                <div class="flex justify-end mb-4">
                    <input
                        type="text"
                        placeholder="Search by book title..."
                        class="border border-gray-300 rounded-md px-4 py-2 w-1/3"
                        v-model="searchQuery"
                    />
                </div>

                <!-- Table -->
                <table class="w-full table-auto border-collapse bg-white" cellspacing="1" cellpadding="1">
                    <thead class="bg-gray-800 text-white text-left">
                        <tr>
                            <th class="px-4 py-2 border-r border-white">Title</th>
                            <th class="px-4 py-2 border-r border-white">Author</th>
                            <th class="px-4 py-2 border-r border-white">Rating</th>
                            <th class="px-4 py-2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-300">
                        <tr v-for="book in filteredBooks" :key="book.id" class="border-b border-r border-white">
                            <td class="px-4 py-2 border-r border-white">{{ book.title }}</td>
                            <td class="px-4 py-2 border-r border-white">by {{ book.author }}</td>
                            <td class="px-4 py-2 border-r border-white">{{ book.rating }}</td>
                            <td class="px-4 py-2">
                                <strong><a @click.prevent="editBook(book.id)">Edit</a></strong>
                                <strong><a @click.prevent="deleteBook(book.id)">Delete</a></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'BookListing',
    data() {
        return {
            books: [],
            searchQuery: ''
        };
    },
    computed: {
        filteredBooks() {
            if (this.searchQuery) {
                return this.books.filter((book) =>
                    book.title.toLowerCase().includes(this.searchQuery.toLowerCase())
                );
            }
            return this.books;
        }
    },
    mounted() {
        this.fetchBooks();
    },
    methods: {
        async fetchBooks() {
            try {
                const response = await axios.get('/api/books');
                this.books = response.data.data;
            } catch (error) {
                console.error('Error fetching books:', error);
            }
        },
        editBook(bookId) {
            window.location.href = `/books/${bookId}/edit`;
            // this.$router.push({ name: 'editBook', params: { id: bookId } });
        },
        // editBook(bookId) {
        //     // Navigate to the edit page
        //     this.$router.push({ name: 'editBook', params: { id: bookId } });
        // },
        async deleteBook(bookId) {
            if (confirm('Are you sure you want to delete this book?')) {
                try {
                    await axios.delete(`/api/books/${bookId}`);
                    this.fetchBooks(); // Refresh the list after deletion
                } catch (error) {
                    console.error('Error deleting book:', error);
                }
            }
        }
    }
}
</script>

<style scoped>
.primary-text {
    color: var(--color-primary);
}
.secondary-text {
    color: var(--color-secondary);
}
.primary-bg {
    background-color: var(--color-primary);
}
.tertiary-bg {
    background-color: var(--color-tertiary);
}
</style>
