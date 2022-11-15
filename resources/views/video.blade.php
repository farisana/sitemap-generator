<video:video>
    <video:thumbnail_loc>{{ $video->thumbnail_loc }}</video:thumbnail_loc>
    <video:title>{{ $video->title }}</video:title>
    <video:description>{{ $video->description }}</video:description>
    <video:player_loc>{{ $video->player_loc }}</video:player_loc>
    <video:publication_date>{{ $video->publication_date }}</video:publication_date>

    @if ($video->duration > 0)
        <video:duration>{{ $video->duration }}</video:duration>
    @endif

    @if (! empty($video->expiration_date))
        <video:expiration_date>{{ $video->expiration_date }}</video:expiration_date>
    @endif

</video:video>
