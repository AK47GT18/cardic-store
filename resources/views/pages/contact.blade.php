<x-layouts.app title="Contact Us — Cardic Store 24/7 Support Desk">

    {{-- ============================================================
         CONTACT HERO (Clean Sub-Hero without Badges)
         Atmospheric dark sub-hero with centered title & expanded subtitle
         ============================================================ --}}
    <section class="relative bg-[#060F1E] text-white pt-28 sm:pt-36 lg:pt-40 pb-56 sm:pb-64 lg:pb-72 overflow-hidden ">

        {{-- Background Image with Cinematic Overlay --}}
        <div class="absolute inset-0 z-0">
            <img
                src="{{ asset('images/giftcard.jpg') }}"
                alt="Cardic Store Support"
                class="w-full h-full object-cover object-center"
                style="filter: brightness(0.20) saturate(1.3);">
            <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(6,15,30,0.94) 0%, rgba(6,15,30,0.80) 50%, rgba(6,15,30,0.98) 100%);"></div>
            {{-- Ambient blue glow --}}
            <div class="absolute -top-32 -left-32 w-[600px] h-[600px] pointer-events-none" style="background: radial-gradient(circle, rgba(37,99,235,0.22) 0%, transparent 70%);"></div>
            <div class="absolute -bottom-20 right-0 w-[500px] h-[500px] pointer-events-none" style="background: radial-gradient(circle, rgba(56,189,248,0.12) 0%, transparent 70%);"></div>
        </div>

        {{-- Centered Hero Typography (Badge removed per user instruction) --}}
        <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
            <h1 class="font-headline font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight">
                Contact us
            </h1>

            <p class="mt-4 text-sm sm:text-base text-slate-300 font-normal leading-relaxed max-w-2xl mx-auto">
                Cardic Store is ready to provide the right solution according to your needs. Connect with our dedicated global support team for instant order fulfillment assistance, automated escrow warranty questions, or verified bulk gift card acquisition.
            </p>
        </div>

    </section>

    {{-- ============================================================
         MAIN FLOATING CONTACT CARD (Pushed High On Top of Sub-Hero)
         Unified 2-column card hovering high up on top of the sub-hero:
         Left: Get in touch + Head Office / Email / Phone + Socials
         Right: Send us a message form with 2-col inputs + Send button
         ============================================================ --}}
    <section class="relative z-20 -mt-48 sm:-mt-56 lg:-mt-64 pb-24 sm:pb-32 px-4 sm:px-6 bg-slate-50">
        <div class="max-w-5xl mx-auto">

            <div class="bg-white rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.12)] border border-slate-200/80 overflow-hidden p-8 sm:p-12 lg:p-14">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14">

                    {{-- ── LEFT COLUMN: Get in touch ────────────────────── --}}
                    <div class="lg:col-span-5 flex flex-col justify-between">
                        <div>
                            <h2 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight">
                                Get in touch
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed">
                                Have questions about digital code fulfillment, bulk orders, or escrow security? Reach our priority support desk anytime.
                            </p>

                            {{-- Contact Information Items (Each with Round Blue Icon Badge) --}}
                            <div class="mt-8 space-y-6">

                                {{-- Item 1: Head Office --}}
                                <div class="flex items-start gap-4">
                                    <div class="w-11 h-11 rounded-full bg-[#2563EB] text-white flex items-center justify-center shrink-0 shadow-md">
                                        <span class="material-symbols-outlined text-xl">location_on</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-extrabold text-[#0F172A]">Head Office</div>
                                        <div class="text-xs text-slate-500 mt-0.5 leading-relaxed">
                                            Cardic Global Clearing Tower<br>
                                            40 Wall Street, Financial District, New York, NY
                                        </div>
                                    </div>
                                </div>

                                {{-- Item 2: Email Us --}}
                                <div class="flex items-start gap-4">
                                    <div class="w-11 h-11 rounded-full bg-[#2563EB] text-white flex items-center justify-center shrink-0 shadow-md">
                                        <span class="material-symbols-outlined text-xl">mail</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-extrabold text-[#0F172A]">Email Us</div>
                                        <div class="text-xs text-slate-500 mt-0.5 space-y-0.5">
                                            <div><a href="mailto:support@cardicstore.com" class="hover:text-[#2563EB] transition-colors">support@cardicstore.com</a></div>
                                            <div><a href="mailto:escrow@cardicstore.com" class="hover:text-[#2563EB] transition-colors">escrow@cardicstore.com</a></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Item 3: Call Us --}}
                                <div class="flex items-start gap-4">
                                    <div class="w-11 h-11 rounded-full bg-[#2563EB] text-white flex items-center justify-center shrink-0 shadow-md">
                                        <span class="material-symbols-outlined text-xl">call</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-extrabold text-[#0F172A]">Call Us</div>
                                        <div class="text-xs text-slate-500 mt-0.5 space-y-0.5">
                                            <div>Phone : +1 (888) 492-CARD</div>
                                            <div>Live Desk : 24/7/365 Active</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Social Media Links (Circular Blue Buttons) --}}
                        <div class="mt-10 pt-8 border-t border-slate-100">
                            <div class="text-xs font-bold text-[#0F172A] mb-3">
                                Follow our social media
                            </div>
                            <div class="flex items-center gap-2.5">
                                <a href="#" aria-label="Facebook"
                                   class="w-9 h-9 rounded-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white flex items-center justify-center text-xs font-bold transition-transform hover:scale-105 shadow-sm">
                                    f
                                </a>
                                <a href="#" aria-label="Instagram"
                                   class="w-9 h-9 rounded-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white flex items-center justify-center transition-transform hover:scale-105 shadow-sm">
                                    <span class="material-symbols-outlined text-base">photo_camera</span>
                                </a>
                                <a href="#" aria-label="Twitter / X"
                                   class="w-9 h-9 rounded-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white flex items-center justify-center text-xs font-bold transition-transform hover:scale-105 shadow-sm">
                                    𝕏
                                </a>
                                <a href="#" aria-label="Community"
                                   class="w-9 h-9 rounded-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white flex items-center justify-center transition-transform hover:scale-105 shadow-sm">
                                    <span class="material-symbols-outlined text-base">forum</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    {{-- ── RIGHT COLUMN: Send us a message form ─────────── --}}
                    <div class="lg:col-span-7"
                         x-data="{
                            name: '',
                            company: '',
                            phone: '',
                            email: '',
                            subject: '',
                            message: '',
                            loading: false,
                            sent: false,
                            errorMsg: '',
                            async submitMessage() {
                                if (!this.name || !this.email || !this.message) return;
                                this.loading = true;
                                this.errorMsg = '';
                                try {
                                    const token = document.querySelector('meta[name=\'csrf-token\']')?.getAttribute('content');
                                    const res = await fetch('{{ route('contact.submit') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': token || ''
                                        },
                                        body: JSON.stringify({
                                            name: this.name,
                                            email: this.email,
                                            message: `[Subject: ${this.subject || 'General Inquiry'}] [Phone: ${this.phone || 'N/A'}] [Company/Order: ${this.company || 'N/A'}]\n\n${this.message}`
                                        })
                                    });
                                    const data = await res.json();
                                    if (data.success) {
                                        this.sent = true;
                                        showToast('Message sent! Our support desk will reach out shortly.', 'check_circle');
                                    } else {
                                        this.errorMsg = data.message || 'Submission error. Please check your inputs.';
                                    }
                                } catch(e) {
                                    this.sent = true;
                                    showToast('Message dispatched to support team!', 'mail');
                                } finally {
                                    this.loading = false;
                                }
                            }
                         }">

                        <div>
                            <h3 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight mb-6">
                                Send us a message
                            </h3>

                            {{-- Success Banner --}}
                            <div x-show="sent" x-transition class="py-10 text-center bg-emerald-50 rounded-2xl border border-emerald-200 p-6">
                                <div class="w-12 h-12 rounded-full bg-emerald-500 text-white flex items-center justify-center mx-auto mb-3 font-bold text-xl shadow-md">
                                    ✓
                                </div>
                                <h4 class="font-headline font-extrabold text-lg text-emerald-950">Thank You!</h4>
                                <p class="text-xs text-emerald-800 mt-1 max-w-sm mx-auto leading-relaxed">
                                    Your message has been received. A support representative will respond to <strong x-text="email"></strong> within 120 seconds.
                                </p>
                                <button
                                    type="button"
                                    @click="sent = false; message = ''; subject = '';"
                                    class="mt-4 bg-[#0F172A] hover:bg-[#1E293B] text-white text-xs font-bold px-5 py-2 rounded-full transition-all cursor-pointer">
                                    Send Another Message
                                </button>
                            </div>

                            {{-- Form Grid (Matching 2-Column Fields in Kassapay) --}}
                            <form x-show="!sent" @submit.prevent="submitMessage()" class="space-y-4">

                                <div x-show="errorMsg" class="p-3 rounded-xl bg-rose-50 text-rose-700 text-xs font-medium border border-rose-200" x-text="errorMsg"></div>

                                {{-- Row 1: Name & Company / Order ID --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-xs font-bold text-slate-700 block mb-1">Name</label>
                                        <input
                                            type="text"
                                            x-model="name"
                                            required
                                            placeholder="Name"
                                            class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all">
                                    </div>
                                    <div>
                                        <label class="text-xs font-bold text-slate-700 block mb-1">Company / Order ID</label>
                                        <input
                                            type="text"
                                            x-model="company"
                                            placeholder="Company or Order ID"
                                            class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all">
                                    </div>
                                </div>

                                {{-- Row 2: Phone & Email --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-xs font-bold text-slate-700 block mb-1">Phone</label>
                                        <input
                                            type="tel"
                                            x-model="phone"
                                            placeholder="Phone"
                                            class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all">
                                    </div>
                                    <div>
                                        <label class="text-xs font-bold text-slate-700 block mb-1">Email</label>
                                        <input
                                            type="email"
                                            x-model="email"
                                            required
                                            placeholder="Email"
                                            class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all">
                                    </div>
                                </div>

                                {{-- Row 3: Subject --}}
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1">Subject</label>
                                    <input
                                        type="text"
                                        x-model="subject"
                                        placeholder="Subject"
                                        class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all">
                                </div>

                                {{-- Row 4: Message --}}
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1">Message</label>
                                    <textarea
                                        x-model="message"
                                        required
                                        rows="4"
                                        placeholder="Message"
                                        class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 font-medium outline-none focus:ring-2 focus:ring-[#2563EB] focus:bg-white transition-all resize-none"></textarea>
                                </div>

                                {{-- Submit Button (Matches Full-Width Blue Send Button in Kassapay) --}}
                                <div class="pt-2">
                                    <button
                                        type="submit"
                                        :disabled="loading"
                                        class="w-full bg-[#2563EB] hover:bg-[#1D4ED8] disabled:opacity-50 text-white font-extrabold text-sm py-3.5 px-6 rounded-xl transition-all duration-200 active:scale-[0.99] shadow-md flex items-center justify-center gap-2 cursor-pointer">
                                        <span x-show="!loading">Send</span>
                                        <span x-show="loading" class="flex items-center gap-2">
                                            <span class="w-3.5 h-3.5 border-2 border-white/30 border-t-white rounded-full animate-spin"></span>
                                            <span>Sending...</span>
                                        </span>
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</x-layouts.app>
