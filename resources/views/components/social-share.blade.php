{{-- resources/views/components/social-share.blade.php --}}
@props(['url' => null, 'title' => null, 'description' => null])

@php
    $shareUrl = $url ?? url()->current();
    $shareTitle = $title ?? 'Check this out';
    $shareDescription = $description ?? '';
    
    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl);
    $twitterUrl = 'https://twitter.com/intent/tweet?url=' . urlencode($shareUrl) . '&text=' . urlencode($shareTitle);
    $linkedinUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($shareUrl);
    $emailUrl = 'mailto:?subject=' . urlencode($shareTitle) . '&body=' . urlencode($shareDescription . ' ' . $shareUrl);
@endphp

<div class="flex items-center space-x-3" x-data="{ showCopied: false }">
    <span class="text-sm font-medium text-gray-600">Share:</span>
    
    <a href="{{ $facebookUrl }}" 
       target="_blank" 
       class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition"
       title="Share on Facebook">
        <i class="fab fa-facebook-f text-sm"></i>
    </a>
    
    <a href="{{ $twitterUrl }}" 
       target="_blank" 
       class="flex items-center justify-center w-10 h-10 bg-blue-400 text-white rounded-full hover:bg-blue-500 transition"
       title="Share on Twitter">
        <i class="fab fa-twitter text-sm"></i>
    </a>
    
    <a href="{{ $linkedinUrl }}" 
       target="_blank" 
       class="flex items-center justify-center w-10 h-10 bg-blue-700 text-white rounded-full hover:bg-blue-800 transition"
       title="Share on LinkedIn">
        <i class="fab fa-linkedin-in text-sm"></i>
    </a>
    
    <a href="{{ $emailUrl }}" 
       class="flex items-center justify-center w-10 h-10 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition"
       title="Share via Email">
        <i class="fas fa-envelope text-sm"></i>
    </a>
    
    <button @click="navigator.clipboard.writeText('{{ $shareUrl }}'); showCopied = true; setTimeout(() => showCopied = false, 2000)" 
            class="flex items-center justify-center w-10 h-10 bg-gray-500 text-white rounded-full hover:bg-gray-600 transition"
            title="Copy Link">
        <i class="fas fa-link text-sm" x-show="!showCopied"></i>
        <i class="fas fa-check text-sm" x-show="showCopied" x-cloak></i>
    </button>
    
    <span x-show="showCopied" 
          x-cloak 
          x-transition
          class="text-sm text-green-600 font-medium">
        Copied!
    </span>
</div>

{{-- Usage: <x-social-share :url="url()->current()" :title="$post->title" :description="$post->excerpt" /> --}}