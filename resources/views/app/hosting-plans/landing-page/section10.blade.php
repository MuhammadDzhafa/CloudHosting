<div class="page-content-inner">
    <div class="lifestyle-dashboard lifestyle-dashboard-v5 section-frame padding-1 gap-6 md:gap-12">
        <h2 class="title-section text-center">
            Articles to Read
        </h2>             
        <div class="media-feed">
            <div class="feed-group">
                <div class="group-content">
                    <div class="columns">
                        <!-- Column for latest article -->
                        <div class="column is-6">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    @if($articles->isNotEmpty())
                                        <?php $latestArticle = $articles->first(); ?>
                                        <div class="media-feed-item is-big has-background-image" 
                                            data-background="{{ asset('storage/' . $latestArticle->image) }}" 
                                            style="min-height: 466px; border: 0.67px solid rgba(245, 245, 245, 1); border-radius: 8px;">
                                            <div class="item-overlay"></div>
                                            <div class="overlay-layer">
                                                <div class="overlay-content">
                                                    <div class="inner-content">
                                                        <h3 class="media-title text-white text-2xl font-bold mb-4">{{ $latestArticle->title }}</h3>
                                                        <div class="media-meta flex items-center text-white">
                                                            <img src="/assets/img/section11/orang.svg" alt="" class="w-12 h-12 rounded-full mr-2">
                                                            <a class="meta-item is-hoverable">{{ $latestArticle->author }}</a>
                                                            <span class="separator">|</span>
                                                            <a class="meta-item is-hoverable">{{ $latestArticle->comments_count ?? 0 }} likes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>                            

                        <!-- Column for other articles -->
                        <div class="column is-6">
                            <div class="columns is-multiline">
                                @foreach($articles->skip(1) as $article)
                                    <div class="column is-6">
                                        <div class="media-feed-item has-background-image" 
                                             data-background="{{ asset('storage/' . $article->image) }}" 
                                             data-demo-background="/assets/img/section11/article2.jpg">
                                            <div class="item-overlay"></div>
                                            <div class="overlay-layer">
                                                <div class="overlay-content">
                                                    <div class="inner-content">
                                                        <h3 class="media-title text-[23px] font-bold leading-[29.9px] text-[#d9d9dd] text-left font-inter">
                                                            {{ $article->title }}
                                                        </h3>                                                        
                                                        <div class="media-meta">
                                                            <img src="/assets/img/section11/orang.svg" alt="">
                                                            <a class="meta-item is-hoverable">{{ $article->author }}</a>
                                                            <span class="separator">|</span>
                                                            <a class="meta-item is-hoverable">{{ $article->likes }} likes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
