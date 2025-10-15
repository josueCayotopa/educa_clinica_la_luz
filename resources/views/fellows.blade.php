<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fellows Program - Empowering Future Leaders</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
     Hero Section 
    <section class="fellows-hero text-white py-24 px-6">
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center">
                <div class="inline-block bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium mb-6">
                    🚀 Applications Open for 2025 Cohort
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Join the Fellows Program
                </h1>
                 Updated text color to use neutral color 
                <p class="text-xl md:text-2xl mb-8 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    A transformative 12-month journey designed to accelerate your career, expand your network, and amplify your impact in technology and innovation.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                     Updated button to use primary red color 
                    <a href="#apply" class="bg-primary text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-primary/90 transition-all hover:scale-105 shadow-lg">
                        Apply Now
                    </a>
                    <a href="#learn-more" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white/10 transition-all">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

     Stats Section 
    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stat-card p-6 rounded-xl text-center">
                     Updated stat numbers to use primary red color 
                    <div class="text-4xl font-bold text-primary mb-2">500+</div>
                    <div class="text-gray-600 font-medium">Alumni Network</div>
                </div>
                <div class="stat-card p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-primary mb-2">12</div>
                    <div class="text-gray-600 font-medium">Months Program</div>
                </div>
                <div class="stat-card p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-primary mb-2">95%</div>
                    <div class="text-gray-600 font-medium">Career Growth</div>
                </div>
                <div class="stat-card p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-primary mb-2">$50K</div>
                    <div class="text-gray-600 font-medium">Stipend Included</div>
                </div>
            </div>
        </div>
    </section>

     What You'll Gain Section 
    <section id="learn-more" class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">What You'll Gain</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Our comprehensive program is designed to accelerate your professional growth through hands-on experience and mentorship.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="benefit-card bg-white p-8 rounded-xl">
                     Updated icon background to use primary red color 
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Expert Mentorship</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Connect with industry leaders and experienced professionals who will guide your journey and provide invaluable insights into your career path.
                    </p>
                </div>

                <div class="benefit-card bg-white p-8 rounded-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Real-World Projects</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Work on meaningful projects that solve real problems, building a portfolio that showcases your skills and impact to future employers.
                    </p>
                </div>

                <div class="benefit-card bg-white p-8 rounded-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Global Network</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Join a diverse community of ambitious fellows and alumni from around the world, creating connections that last a lifetime.
                    </p>
                </div>

                <div class="benefit-card bg-white p-8 rounded-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Skill Development</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Access workshops, training sessions, and resources designed to enhance both your technical abilities and leadership capabilities.
                    </p>
                </div>

                <div class="benefit-card bg-white p-8 rounded-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Financial Support</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Receive a $50,000 stipend to support your living expenses, allowing you to focus fully on your growth and development.
                    </p>
                </div>

                <div class="benefit-card bg-white p-8 rounded-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Career Opportunities</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Gain access to exclusive job opportunities and career advancement pathways with our partner organizations and alumni network.
                    </p>
                </div>
            </div>
        </div>
    </section>

     Program Timeline 
    <section class="py-20 px-6 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Program Timeline</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    A structured 12-month journey designed for maximum impact
                </p>
            </div>

            <div class="space-y-12">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                         Updated timeline labels to use primary red color 
                        <div class="text-primary font-semibold mb-2">Months 1-3</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Onboarding & Foundation</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Get acquainted with the program, meet your cohort, and establish your goals. Participate in intensive workshops covering essential skills and frameworks.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="text-primary font-semibold mb-2">Months 4-8</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Project Execution</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Dive deep into your chosen project, working closely with mentors and team members. Apply your skills to real-world challenges and iterate based on feedback.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="text-primary font-semibold mb-2">Months 9-12</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Impact & Transition</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Showcase your work, measure your impact, and prepare for your next career move. Receive personalized career coaching and connect with potential employers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

     Testimonials 
    <section class="py-20 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">What Fellows Say</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Hear from alumni who have transformed their careers
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                         Updated avatar background to use primary red color 
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                            S
                        </div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Sarah Chen</div>
                            <div class="text-sm text-gray-600">2023 Cohort</div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        "The Fellows Program completely transformed my career trajectory. The mentorship and real-world projects gave me the confidence and skills to land my dream role."
                    </p>
                </div>

                <div class="testimonial-card p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                            M
                        </div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Marcus Johnson</div>
                            <div class="text-sm text-gray-600">2022 Cohort</div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        "The network I built during the program has been invaluable. I'm still collaborating with fellows and mentors on exciting projects two years later."
                    </p>
                </div>

                <div class="testimonial-card p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                            P
                        </div>
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Priya Patel</div>
                            <div class="text-sm text-gray-600">2024 Cohort</div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        "This program gave me the space and support to take risks and grow. The stipend meant I could focus entirely on learning without financial stress."
                    </p>
                </div>
            </div>
        </div>
    </section>

     CTA Section 
    <section id="apply" class="cta-section text-white py-20 px-6">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Transform Your Career?</h2>
             Updated text color for better contrast 
            <p class="text-xl mb-8 text-white/90 leading-relaxed">
                Applications for the 2025 cohort are now open. Join a community of ambitious individuals committed to making an impact.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                 Updated button to use primary red color 
                <a href="#" class="bg-primary text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-primary/90 transition-all hover:scale-105 shadow-lg">
                    Start Your Application
                </a>
                <a href="#" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white/10 transition-all">
                    Download Brochure
                </a>
            </div>
             Updated text color for better readability 
            <p class="text-sm text-white/80">
                Application deadline: March 31, 2025 • Program starts: June 1, 2025
            </p>
        </div>
    </section>

     Footer 
    <footer class="bg-gray-900 text-gray-400 py-12 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <p class="mb-4">© 2025 Fellows Program. All rights reserved.</p>
            <div class="flex justify-center gap-6">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html>
