<button id="ai-chat-button" class="fixed bottom-5 right-5 bg-transparent border-none cursor-pointer p-0">
    <span class="sr-only">AI chat</span>
    <img src="/assets/img/icons/icon ai baru.svg" alt="AI Chat" class="shadow-lg shadow-cyan-500/30 hover:shadow-cyan-500/50 transition-shadow duration-300 bg-transparent">
</button>                        

<div id="ai-chat-window" class="fixed bottom-[110px] md:bottom-[120px] right-5 w-[350px] md:w-[404px] h-[400px] md:h-[423px] bg-white rounded-lg flex flex-col justify-between p-[20px] md:p-[25px] gap-0 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] z-50 hidden" style="border: 3px solid transparent; border-radius: 6px; border-image-source: linear-gradient(180deg, #4A6DCB, #643493); border-image-slice: 1;">
    <div class="p-3 md:p-4 flex justify-between items-center relative">
        <div id="greeting" class="text-[20px] md:text-[23px] font-[400] leading-[26px] md:leading-[29.9px] text-[#283252] text-left font-inter">
            Hi there!
        </div>
        <button id="close-chat" class="text-gray-500 hover:text-gray-700 absolute -right-1 top-1/2 transform -translate-y-1/2">
            <img src="/assets/img/icons/close.svg" alt="">
        </button>
    </div>
    <div id="initial-content">
        <p class="text-[20px] md:text-[23px] font-[400] leading-[26px] md:leading-[29.9px] text-[#A9A9B2] text-left px-3 md:px-4 font-inter">
            How can we help?
        </p>
        <div class="p-3 md:p-4 grid grid-cols-2 gap-3">
            <button class="w-[140px] md:w-[154.5px] h-[100px] md:h-[116px] p-[12px] md:p-[13px_17px] gap-[8px] md:gap-[10px] rounded-[22px] md:rounded-[26px] border border-[#DBDBDB] bg-white text-left opacity-100 hover:bg-gray-200">
                <span class="block text-[13px] md:text-[14px] font-[400] leading-[18px] md:leading-[20.3px] text-[#283252] text-left font-inter">
                    Our best-selling package
                </span>
                <div class="flex justify-end">
                    <img src="/assets/img/icons/fire.svg" alt="" class="w-[36px] md:w-[40px] h-[36px] md:h-[40px]">
                </div>
            </button>
            <button class="w-[140px] md:w-[154.5px] h-[100px] md:h-[116px] p-[12px] md:p-[13px_17px] gap-[8px] md:gap-[10px] rounded-[22px] md:rounded-[26px] border border-[#DBDBDB] bg-white text-left opacity-100 hover:bg-gray-200">
                <span class="block text-[13px] md:text-[14px] font-[400] leading-[18px] md:leading-[20.3px] text-[#283252] text-left font-inter">
                    Cheapest cloud hosting plan
                </span>
                <div class="flex justify-end">
                    <img src="/assets/img/icons/smile.svg" alt="" class="w-[36px] md:w-[40px] h-[36px] md:h-[40px]">
                </div>
            </button>
        </div>
    </div>
    <div id="chat-messages" class="flex-grow overflow-y-auto mb-3 md:mb-4" style="display: none;">
        <!-- Chat messages will be added here -->
    </div>
    <div class="mt-auto p-3 md:p-4">
        <div class="w-[280px] md:w-[324px] h-[50px] md:h-[60px] py-[8px] md:py-[10px] px-[16px] md:px-[20px] bg-[#EBEFF9] hover:bg-[#d4e1f7] text-[#4A6DCB] rounded-[9999px] flex items-center justify-between gap-[5px] opacity-100" style="font-family: Inter; font-size: 13px; md:font-size: 14px; font-weight: 400; line-height: 18px; md:line-height: 20.3px; text-align: left;">
            <input id="user-input" type="text" class="bg-transparent border-none outline-none flex-grow" placeholder="Ask AI Assistant">
            <button id="send-message">
                <img src="/assets/img/icons/plane.svg" alt="" class="w-4 md:w-5 h-4 md:h-5">
            </button>
        </div>                                                             
    </div>
</div>