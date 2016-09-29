<?php

namespace tests\eLife\Search\Api\Response;

use eLife\Search\Api\Response\PodcastEpisodeResponse;
use tests\eLife\Search\SerializerTest;

class PodcastEpisodeResponseTest extends SerializerTest
{
    public function getResponseClass() : string
    {
        return PodcastEpisodeResponse::class;
    }

    public function jsonProvider() : array
    {
        $minimum = '
        {
            "number": 30,
            "title": "June 2016",
            "published": "2016-07-01T08:30:15+00:00",
            "image": {
                "alt": "",
                "sizes": {
                    "2:1": {
                        "900": "https://placehold.it/900x450",
                        "1800": "https://placehold.it/1800x900"
                    },
                    "16:9": {
                        "250": "https://placehold.it/250x141",
                        "500": "https://placehold.it/500x281"
                    },
                    "1:1": {
                        "70": "https://placehold.it/70x70",
                        "140": "https://placehold.it/140x140"
                    }
                }
            },
            "sources": [
                {
                    "mediaType": "audio/mpeg",
                    "uri": "https://nakeddiscovery.com/scripts/mp3s/audio/eLife_Podcast_16.05.mp3"
                }
            ],
            "chapters": [
                {
                    "number": 1,
                    "title": "Green drug factories",
                    "time": 0,
                    "content": [
                        {
                            "type": "research-article",
                            "status": "vor",
                            "id": "13664",
                            "version": 1,
                            "doi": "10.7554/eLife.13664",
                            "title": "A new synthetic biology approach allows transfer of an entire metabolic pathway from a medicinal plant to a biomass crop",
                            "published": "2016-06-14T07:00:15Z",
                            "volume": 5,
                            "elocationId": "e13664"
                        }
                    ]
                }
            ]
        }
        ';
        $minimum_expected = '
        {
            "number": 30,
            "type": "podcast-episode",
            "title": "June 2016",
            "published": "2016-07-01T08:30:15+00:00",
            "image": {
                "alt": "",
                "sizes": {
                    "2:1": {
                        "900": "https://placehold.it/900x450",
                        "1800": "https://placehold.it/1800x900"
                    },
                    "16:9": {
                        "250": "https://placehold.it/250x141",
                        "500": "https://placehold.it/500x281"
                    },
                    "1:1": {
                        "70": "https://placehold.it/70x70",
                        "140": "https://placehold.it/140x140"
                    }
                }
            },
            "sources": [
                {
                    "mediaType": "audio/mpeg",
                    "uri": "https://nakeddiscovery.com/scripts/mp3s/audio/eLife_Podcast_16.05.mp3"
                }
            ]
        }
        ';
        $complete = '
        {
            "number": 30,
            "title": "July 2016",
            "impactStatement": "In this episode of the eLife podcast we hear about drug production, early career researchers, honeybees, human migrations and pain.",
            "published": "2016-07-01T08:30:15+00:00",
            "image": {
                "alt": "",
                "sizes": {
                    "2:1": {
                        "900": "https://placehold.it/900x450",
                        "1800": "https://placehold.it/1800x900"
                    },
                    "16:9": {
                        "250": "https://placehold.it/250x141",
                        "500": "https://placehold.it/500x281"
                    },
                    "1:1": {
                        "70": "https://placehold.it/70x70",
                        "140": "https://placehold.it/140x140"
                    }
                }
            },
            "sources": [
                {
                    "mediaType": "audio/mpeg",
                    "uri": "https://nakeddiscovery.com/scripts/mp3s/audio/eLife_Podcast_16.05.mp3"
                }
            ],
            "subjects": [
                "biochemistry",
                "ecology"
            ],
            "chapters": [
                {
                    "number": 1,
                    "title": "Green drug factories",
                    "time": 0,
                    "impactStatement": "A new way to produce a malaria drug using tobacco plants",
                    "content": [
                        {
                            "type": "research-article",
                            "status": "vor",
                            "id": "13664",
                            "version": 1,
                            "doi": "10.7554/eLife.13664",
                            "title": "A new synthetic biology approach allows transfer of an entire metabolic pathway from a medicinal plant to a biomass crop",
                            "published": "2016-06-14T07:00:15Z",
                            "volume": 5,
                            "elocationId": "e13664",
                            "pdf": "https://elifesciences.org/content/5/e13664.pdf",
                            "subjects": [
                                "biochemistry",
                                "plant-biology"
                            ],
                            "impactStatement": "A combination of chloroplast transformation with nuclear transformation and large-scale metabolic screening of supertransformed plant lines has enabled an entire biochemical pathway to be transferred from a medicinal plant to a high-biomass crop.",
                            "image": {
                                "alt": "",
                                "sizes": {
                                    "2:1": {
                                        "900": "https://placehold.it/900x450",
                                        "1800": "https://placehold.it/1800x900"
                                    },
                                    "16:9": {
                                        "250": "https://placehold.it/250x141",
                                        "500": "https://placehold.it/500x281"
                                    },
                                    "1:1": {
                                        "70": "https://placehold.it/70x70",
                                        "140": "https://placehold.it/140x140"
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    "number": 2,
                    "title": "Lost generation",
                    "time": 300,
                    "impactStatement": "Is science at risk of losing talented researchers to other professions?",
                    "content": [
                        {
                            "type": "feature",
                            "status": "vor",
                            "id": "17393",
                            "version": 1,
                            "doi": "10.7554/eLife.17393",
                            "title": "Point of view: Avoiding a lost generation of scientists",
                            "published": "2016-05-13T14:30:00Z",
                            "volume": 5,
                            "elocationId": "e17393",
                            "pdf": "https://elifesciences.org/content/5/17393.pdf",
                            "impactStatement": "By sharing their experiences, early-career scientists can help to make the case for increased government funding for researchers.",
                            "image": {
                                "alt": "",
                                "sizes": {
                                    "2:1": {
                                        "900": "https://placehold.it/900x450",
                                        "1800": "https://placehold.it/1800x900"
                                    },
                                    "16:9": {
                                        "250": "https://placehold.it/250x141",
                                        "500": "https://placehold.it/500x281"
                                    },
                                    "1:1": {
                                        "70": "https://placehold.it/70x70",
                                        "140": "https://placehold.it/140x140"
                                    }
                                }
                            }
                        },
                        {
                            "type": "collection",
                            "id": "1",
                            "title": "Tropical disease",
                            "updated": "2015-09-16T11:19:26+00:00",
                            "image": {
                                "alt": "",
                                "sizes": {
                                    "2:1": {
                                        "900": "https://placehold.it/900x450",
                                        "1800": "https://placehold.it/1800x900"
                                    },
                                    "16:9": {
                                        "250": "https://placehold.it/250x141",
                                        "500": "https://placehold.it/500x281"
                                    },
                                    "1:1": {
                                        "70": "https://placehold.it/70x70",
                                        "140": "https://placehold.it/140x140"
                                    }
                                }
                            },
                            "selectedCurator": {
                                "id": "pjha",
                                "type": "senior-editor",
                                "name": {
                                    "preferred": "Prabhat Jha",
                                    "index": "Jha, Prabhat"
                                }
                            }
                        }
                    ]
                }
            ]
        }

        ';
        $complete_expected = '
         {
            "number": 30,
            "type": "podcast-episode",
            "title": "July 2016",
            "impactStatement": "In this episode of the eLife podcast we hear about drug production, early career researchers, honeybees, human migrations and pain.",
            "published": "2016-07-01T08:30:15+00:00",
            "image": {
                "alt": "",
                "sizes": {
                    "2:1": {
                        "900": "https://placehold.it/900x450",
                        "1800": "https://placehold.it/1800x900"
                    },
                    "16:9": {
                        "250": "https://placehold.it/250x141",
                        "500": "https://placehold.it/500x281"
                    },
                    "1:1": {
                        "70": "https://placehold.it/70x70",
                        "140": "https://placehold.it/140x140"
                    }
                }
            },
            "sources": [
                {
                    "mediaType": "audio/mpeg",
                    "uri": "https://nakeddiscovery.com/scripts/mp3s/audio/eLife_Podcast_16.05.mp3"
                }
            ],
            "subjects": [
                "biochemistry",
                "ecology"
            ]
         }
        ';

        return [
            [
                $minimum, $minimum_expected,
            ],
            [
                $complete, $complete_expected,
            ],
        ];
    }
}
