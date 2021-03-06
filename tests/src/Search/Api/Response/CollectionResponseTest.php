<?php

namespace tests\eLife\Search\Api\Response;

use eLife\Search\Api\Response\CollectionResponse;
use tests\eLife\Search\RamlRequirement;
use tests\eLife\Search\SerializerTest;

class CollectionResponseTest extends SerializerTest
{
    use RamlRequirement;

    public function testDeserialization()
    {
        $data = [
            'id' => '1',
            'title' => 'Tropical disease',
            'impactStatement' => 'eLife has published papers on many tropical diseases, including malaria, Ebola, leishmaniases, Dengue and African sleeping sickness. The articles below have been selected by eLife editors to give a flavour of the breadth of research on tropical diseases published by the journal.',
            'image' => [
                'banner' => [
                    'alt' => '',
                    'sizes' => [
                        '2:1' => [
                            900 => 'https://placehold.it/900x450',
                            1800 => 'https://placehold.it/1800x900',
                        ],
                    ],
                ],
                'thumbnail' => [
                    'alt' => '',
                    'sizes' => [
                        '16:9' => [
                            250 => 'https://placehold.it/250x141',
                            500 => 'https://placehold.it/500x281',
                        ],
                        '1:1' => [
                            70 => 'https://placehold.it/70x70',
                            140 => 'https://placehold.it/140x140',
                        ],
                    ],
                ],
            ],
            'published' => '2015-09-16T11:19:26Z',
            'selectedCurator' => [
                'etAl' => true,
                'id' => 'pjha',
                'type' => 'senior-editor',
                'name' => [
                    'preferred' => 'Prabhat Jha',
                    'index' => 'Jha, Prabhat',
                ],
                'image' => null,
            ],
        ];
        $collection = $this->responseFromArray(CollectionResponse::class, $data);

        $this->assertSame('1', $collection->id);
        $this->assertSame('Tropical disease', $collection->title);
        $this->assertSame($data['image']['thumbnail'], (array) $collection->image->thumbnail);
        $this->assertSame($data['image']['banner'], (array) $collection->image->banner);
        $this->assertSame('2015-09-16T11:19:26Z', $collection->published->format('Y-m-d\TH:i:s\Z'));
        $this->assertEquals($data['selectedCurator'], (array) $collection->selectedCurator);
        $this->assertSame($data['selectedCurator']['id'], $collection->selectedCurator->id);
        $this->assertSame($data['selectedCurator']['type'], $collection->selectedCurator->type);
        $this->assertSame($data['selectedCurator']['etAl'], $collection->selectedCurator->etAl);
        $this->assertSame($data['selectedCurator']['name']['index'], $collection->selectedCurator->name['index']);
        $this->assertSame($data['selectedCurator']['name']['preferred'], $collection->selectedCurator->name['preferred']);
        $this->assertSame($data['selectedCurator']['image'], $collection->selectedCurator->image);
    }

    public function getResponseClass() : string
    {
        return CollectionResponse::class;
    }

    public function jsonProvider() : array
    {
        return [
            [
                $this->getFixture('collection/v1/minimum.json'), '
                {
                    "selectedCurator": {
                        "id": "pjha",
                        "type": "senior-editor",
                        "name": {
                            "preferred": "Prabhat Jha",
                            "index": "Jha, Prabhat"
                        },
                        "etAl": false
                    },
                    "type": "collection",
                    "id": "1",
                    "title": "Tropical disease",
                    "image": {
                        "banner": {
                            "alt": "",
                            "sizes": {
                                "2:1": {
                                    "900": "https:\/\/placehold.it\/900x450",
                                    "1800": "https:\/\/placehold.it\/1800x900"
                                }
                            }
                        },
                        "thumbnail": {
                            "alt": "",
                            "sizes": {
                                "16:9": {
                                    "250": "https:\/\/placehold.it\/250x141",
                                    "500": "https:\/\/placehold.it\/500x281"
                                },
                                "1:1": {
                                    "70": "https:\/\/placehold.it\/70x70",
                                    "140": "https:\/\/placehold.it\/140x140"
                                }
                            }
                        }
                    },
                    "published": "2015-09-16T11:19:26Z"
                }',
            ],
            [
                $this->getFixture('collection/v1/complete.json'), '
                {
                    "selectedCurator": {
                        "id": "pjha",
                        "type": "senior-editor",
                        "name": {
                            "preferred": "Prabhat Jha",
                            "index": "Jha, Prabhat"
                        },
                        "etAl": true
                    },
                    "type": "collection",
                    "id": "1",
                    "title": "Tropical disease",
                    "impactStatement": "eLife has published papers on many tropical diseases, including malaria, Ebola, leishmaniases, Dengue and African sleeping sickness. The articles below have been selected by eLife editors to give a flavour of the breadth of research on tropical diseases published by the journal.",
                    "subjects": [
                        {
                            "id": "epidemiology-global-health",
                            "name": "Epidemiology and Global Health"
                        },
                        {
                            "id": "microbiology-infectious-disease",
                            "name": "Microbiology and Infectious Disease"
                        }
                    ],
                    "image": {
                        "banner": {
                            "alt": "",
                            "sizes": {
                                "2:1": {
                                    "900": "https:\/\/placehold.it\/900x450",
                                    "1800": "https:\/\/placehold.it\/1800x900"
                                }
                            }
                        },
                        "thumbnail": {
                            "alt": "",
                            "sizes": {
                                "16:9": {
                                    "250": "https:\/\/placehold.it\/250x141",
                                    "500": "https:\/\/placehold.it\/500x281"
                                },
                                "1:1": {
                                    "70": "https:\/\/placehold.it\/70x70",
                                    "140": "https:\/\/placehold.it\/140x140"
                                }
                            }
                        }
                    },
                    "published": "2015-09-16T11:19:26Z",
                    "updated": "2015-09-17T11:19:26Z"
                }',
            ],
        ];
    }
}
