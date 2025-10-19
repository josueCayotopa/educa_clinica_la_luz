     <!-- Contact Section -->
    <section id="contacto" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mb-4">Contáctanos</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    ¿Interesado en nuestro programa? Completa el formulario y nos pondremos en contacto contigo
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-neutral p-8 rounded-xl shadow-lg">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-secondary font-bold mb-2">Nombre Completo</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="email" class="block text-secondary font-bold mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="phone" class="block text-secondary font-bold mb-2">Teléfono</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="specialty" class="block text-secondary font-bold mb-2">Especialidad de Interés</label>
                                <select id="specialty" name="specialty" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                                    <option value="">Seleccionar...</option>
                                    <option value="segmento-anterior">Segmento Anterior, Córnea y Cirugía Refractiva</option>
                                    <option value="glaucoma">Glaucoma Clínico-Quirúrgico</option>
                                    <option value="retina">Retina y Vítreo Clínico-Quirúrgico</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block text-secondary font-bold mb-2">Mensaje</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-primary-dark transition-all duration-300 shadow-lg hover:shadow-xl">
                                Enviar Solicitud
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Dirección</h4>
                                <p class="text-gray-700">Clínica La Luz<br>Lima, Perú</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Email</h4>
                                <p class="text-gray-700">fellows@clinicalaluz.com.pe</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Teléfono</h4>
                                <p class="text-gray-700">+51 XXX XXX XXX</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <h4 class="font-bold text-secondary mb-4">Síguenos</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>