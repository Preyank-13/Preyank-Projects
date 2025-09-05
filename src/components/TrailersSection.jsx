import React, { useState, useEffect, useRef } from "react";
import { dummyTrailers } from "../assets/assets";
import BlurCircle from "./BlurCircle";
import { PlayCircleIcon } from "lucide-react";
import YouTubePlayer from "youtube-player";

const TrailerSection = () => {
  const [currentTrailer, setCurrentTrailer] = useState(dummyTrailers[0]);
  const playerRef = useRef(null);
  const ytPlayerRef = useRef(null);

  // youtube player 
  useEffect(() => {
    // Create YouTube player once after mount
    ytPlayerRef.current = YouTubePlayer(playerRef.current, {
      videoId: extractVideoId(currentTrailer.videoUrl),
    });

    return () => {
      ytPlayerRef.current.destroy?.();
    };
  }, []);

  // Whenever currentTrailer changes, load the new video
  useEffect(() => {
    if (ytPlayerRef.current) {
      ytPlayerRef.current.loadVideoById(
        extractVideoId(currentTrailer.videoUrl)
      );
    }
  }, [currentTrailer]);

  // Helper: Extract the YouTube video ID from any URL
  const extractVideoId = (url) => {
    const match = url.match(
      /(?:v=|\/embed\/|\.be\/)([a-zA-Z0-9_-]{11})/
    );
    return match ? match[1] : url;
  };

  return (
    <div className="px-6 md:px-16 lg:px-24 xl:px-44 py-20 overflow-hidden">
      <p className="text-gray-300 font-medium text-lg max-w-[960px] mx-auto">
        Trailers
      </p>

      <div className="relative mt-6">
        <BlurCircle top="-100px" right="-100px" />
        {/* YouTube Player Container */}
        <div
          id="player"
          ref={playerRef}
          className="mx-auto max-w-full"
          style={{ width: "960px", height: "540px" }}
        ></div>
      </div>

      <div className="group grid grid-cols-4 gap-4 md:gap-8 max-w-3xl mx-auto mt-6">
        {dummyTrailers.map((trailer) => (
          <div
            key={trailer.image}
            className="relative group-hover:not-hover:opacity-50 hover:translate-y-1 duration-300 transition max-md:h-60 md:max-h-60 cursor-pointer"
            onClick={() => setCurrentTrailer(trailer)}
          >
            <img
              src={trailer.image}
              alt="trailer"
              className="rounded-lg w-full h-full object-cover brightness-75"
            />
            <PlayCircleIcon
              strokeWidth={1.6}
              className="absolute top-1/2 left-1/2 w-5 md:w-8 h-5 md:h-12 transform -translate-x-1/2 -translate-y-1/2"
            />
          </div>
        ))}
      </div>
    </div>
  );
};

export default TrailerSection;