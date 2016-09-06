<?php

namespace tests\eLife\Search\Api\Response;

use eLife\Search\Api\Response\ArticleResponse\VorArticle;
use tests\eLife\Search\SerializerTest;

class VorArticleResponseTest extends SerializerTest
{
    public function getResponseClass() : string
    {
        return VorArticle::class;
    }

    public function jsonProvider() : array
    {
        $minimum = '
        {
            "status": "vor",
            "id": "09560",
            "version": 1,
            "type": "research-article",
            "doi": "10.7554/eLife.09560",
            "title": "<i>Homo naledi</i>, a new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa",
            "published": "2015-09-10T00:00:00Z",
            "volume": 4,
            "elocationId": "e09560",
            "copyright": {
                "license": "CC-BY-4.0",
                "holder": "Berger et al",
                "statement": "This article is distributed under the terms of the <a href=\"http://creativecommons.org/licenses/by/4.0/\">Creative Commons Attribution License</a> permitting unrestricted use and redistribution provided that the original author and source are credited."
            },
            "body": [
                {
                    "type": "section",
                    "title": "Introduction",
                    "content": [
                        {
                            "type": "paragraph",
                            "text": "Fossil hominins were first recognized in the Dinaledi Chamber in the Rising Star cave system in October 2013. During a relatively short excavation, our team recovered an extensive collection of 1550 hominin specimens, representing nearly every element of the skeleton multiple times (Figure 1), including many complete elements and morphologically informative fragments, some in articulation, as well as smaller fragments many of which could be refit into more complete elements. The collection is a morphologically homogeneous sample that can be attributed to no previously-known hominin species. Here we describe this new species, <i>Homo naledi</i>. We have not defined <i>H. naledi</i> narrowly based on a single jaw or skull because the entire body of material has informed our understanding of its biology."
                        }
                    ]
                }
            ]
        }
        ';
        $minimum_expected = '
        {
            "type": "research-article",
            "status": "vor",
            "id": "09560",
            "version": 1,
            "type": "research-article",
            "doi": "10.7554/eLife.09560",
            "title": "<i>Homo naledi</i>, a new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa",
            "published": "2015-09-10T00:00:00+00:00",
            "volume": 4,
            "elocationId": "e09560"
        }
        ';

        $complete = <<<JSON
        {
            "status": "vor",
            "id": "09560",
            "version": 1,
            "type": "research-article",
            "doi": "10.7554/eLife.09560",
            "title": "<i>Homo naledi</i>, a new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa",
            "published": "2015-09-10T00:00:00+00:00",
            "volume": 4,
            "issue": 3,
            "elocationId": "e09560",
            "copyright": {
                "license": "CC-BY-4.0",
                "holder": "Berger et al",
                "statement": "This article is distributed under the terms of the <a href=\"http://creativecommons.org/licenses/by/4.0/\">Creative Commons Attribution License</a> permitting unrestricted use and redistribution provided that the original author and source are credited."
            },
            "pdf": "https://elifesciences.org/content/4/e09560.pdf",
            "subjects": [
                "genomics-evolutionary-biology"
            ],
            "researchOrganisms": [
                "<i>Homo naledi</i>"
            ],
            "keywords": [
                "<i>Homo naledi</i>",
                "hominin",
                "Dinaledi Chamber",
                "paleoanthropology"
            ],
            "relatedArticles": [
                "09561",
                "10627"
            ],
            "impactStatement": "A new hominin species has been unearthed in the Dinaledi Chamber of the Rising Star cave system in the largest assemblage of a single species of hominins yet discovered in Africa.",
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
            "abstract": {
                "doi": "10.7554/eLife.09560.001",
                "content": [
                    {
                        "type": "paragraph",
                        "text": "<i>Homo naledi</i> is a previously-unknown species of extinct hominin discovered within the Dinaledi Chamber of the Rising Star cave system, Cradle of Humankind, South Africa. This species is characterized by body mass and stature similar to small-bodied human populations but a small endocranial volume similar to australopiths. Cranial morphology of <i>H. naledi</i> is unique, but most similar to early <i>Homo</i> species including <i>Homo erectus</i>, <i>Homo habilis</i> or <i>Homo rudolfensis</i>. While primitive, the dentition is generally small and simple in occlusal morphology. <i>H. naledi</i> has humanlike manipulatory adaptations of the hand and wrist. It also exhibits a humanlike foot and lower limb. These humanlike aspects are contrasted in the postcrania with a more primitive or australopith-like trunk, shoulder, pelvis and proximal femur. Representing at least 15 individuals with most skeletal elements repeated multiple times, this is the largest assemblage of a single species of hominins yet discovered in Africa."
                    }
                ]
            },
            "digest": {
                "doi": "10.7554/eLife.09560.002",
                "content": [
                    {
                        "type": "paragraph",
                        "text": "Modern humans, or <i>Homo sapiens</i>, are now the only living species in their genus. But as recently as 100,000 years ago, there were several other species that belonged to the genus <i>Homo</i>. Together with modern humans, these extinct human species, our immediate ancestors and their close relatives, are collectively referred to as ‘hominins’."
                    },
                    {
                        "type": "paragraph",
                        "text": "Now Berger et al. report the recent discovery of an extinct species from the genus <i>Homo</i> that was unearthed from deep underground in what has been named the Dinaledi Chamber, in the Rising Star cave system in South Africa. The species was named <i>Homo naledi;</i> ‘naledi’ means ‘star’ in Sotho (also called Sesotho), which is one of the languages spoken in South Africa."
                    },
                    {
                        "type": "paragraph",
                        "text": "The unearthed fossils were from at least 15 individuals and include multiple examples of most of the bones in the skeleton. Based on this wide range of specimens from a single site, Berger et al. describe <i>Homo naledi</i> as being similar in size and weight to a small modern human, with human-like hands and feet. Furthermore, while the skull had several unique features, it had a small braincase that was most similar in size to other early hominin species that lived between four million and two million years ago. <i>Homo naledi</i>'s ribcage, shoulders and pelvis also more closely resembled those of earlier hominin species than those of modern humans."
                    },
                    {
                        "type": "paragraph",
                        "text": "The <i>Homo naledi</i> fossils are the largest collection of a single species of hominin that has been discovered in Africa so far and, in a related study, Dirks et al. describe the setting and context for these fossils. However, since the age of the fossils remains unclear, one of the next challenges will be to date the remains to provide more information about the early evolution of humans and their close relatives."
                    }
                ]
            },
            "body": [
                {
                    "type": "section",
                    "title": "Introduction",
                    "content": [
                        {
                            "type": "paragraph",
                            "text": "Fossil hominins were first recognized in the Dinaledi Chamber in the Rising Star cave system in October 2013. During a relatively short excavation, our team recovered an extensive collection of 1550 hominin specimens, representing nearly every element of the skeleton multiple times (Figure 1), including many complete elements and morphologically informative fragments, some in articulation, as well as smaller fragments many of which could be refit into more complete elements. The collection is a morphologically homogeneous sample that can be attributed to no previously-known hominin species. Here we describe this new species, <i>Homo naledi</i>. We have not defined <i>H. naledi</i> narrowly based on a single jaw or skull because the entire body of material has informed our understanding of its biology."
                        },
                        {
                            "type": "image",
                            "doi": "10.7554/eLife.09560.003",
                            "id": "fig1",
                            "label": "Figure 1",
                            "title": "Dinaledi skeletal specimens.",
                            "caption": [
                                {
                                    "type": "paragraph",
                                    "text": "The figure includes approximately all of the material incorporated in this diagnosis, including the holotype specimen, paratypes and referred material. These make up 737 partial or complete anatomical elements, many of which consist of several refitted specimens. Specimens not identified to element, such as non-diagnostic long bone or cranial fragments, and a subset of fragile specimens are not shown here. The ‘skeleton’ layout in the center of the photo is a composite of elements that represent multiple individuals. This view is foreshortened; the table upon which the bones are arranged is 120-cm wide for scale."
                                },
                                {
                                    "type": "mathml",
                                    "id": "eqn1",
                                    "label": "[1]",
                                    "mathml": "<math><mrow><msub><mtext>e</mtext><mn>0</mn></msub><mo>=</mo><mfrac><mrow><msub><mtext>e</mtext><mrow><mn>0</mn><mo>,</mo><mtext>max</mtext></mrow></msub><mo>×</mo><mtext>GDP</mtext></mrow><mrow><mtext>GDP</mtext><mo>+</mo><msub><mtext>K</mtext><mrow><mtext>inc</mtext></mrow></msub></mrow></mfrac><mo>,</mo></mrow></math>"
                                }
                            ],
                            "alt": "",
                            "uri": "https://elife-publishing-cdn.s3.amazonaws.com/09560/elife-09560-fig1-v1.jpg",
                            "supplements": [
                                {
                                    "type": "image",
                                    "doi": "10.7554/eLife.09560.019",
                                    "id": "fig1s1",
                                    "label": "Figure 1—figure supplement 1",
                                    "title": "Holotype specimen of <i>Homo naledi</i>, Dinaledi Hominin 1 (DH1)",
                                    "caption": [
                                        {
                                            "type": "paragraph",
                                            "text": "U.W. 101-1473 cranium in (<b>A</b>) posterior and (<b>B</b>) frontal views (frontal view minus the frontal fragment to show calvaria interior). U.W. 101-1277 maxilla in (<b>C</b>) medial, (<b>D</b>) frontal, (<bold>E</bold>) superior, and (<b>F</b>) occlusal views. (<b>G</b>) U.W. 101-1473 cranium in anatomical alignment with occluded U.W. 101-1277 maxilla and U.W. 101-1261 mandible in left lateral view. U.W. 101-1277 mandible in (<b>H</b>) occlusal, (<b>I</b>) basal, (<b>J</b>) right lateral, and (<b>K</b>) anterior views. Scale bar = 10 cm."
                                        }
                                    ],
                                    "alt": "",
                                    "uri": "https://elife-publishing-cdn.s3.amazonaws.com/09560/elife-09560-fig2-v1.jpg",
                                    "attribution": [
                                        "By some person."
                                    ],
                                    "sourceData": [
                                        {
                                            "doi": "10.7554/eLife.00011.005",
                                            "id": "fig1s1data1",
                                            "label": "Figure 1—figure supplement 1—source data 1",
                                            "title": "Gene expression values for all UCSC genes from our mouse liver Nascent-Seq dataset",
                                            "mediaType": "text/plain",
                                            "uri": "https://elife-publishing-cdn.s3.amazonaws.com/00011/elife-00011-fig2-data1-v1.txt"
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            "type": "section",
                            "title": "Etymology",
                            "content": [
                                {
                                    "type": "box",
                                    "doi": "10.7554/eLife.09560.005",
                                    "id": "box1",
                                    "label": "Box 1",
                                    "title": "First box",
                                    "content": [
                                        {
                                            "type": "paragraph",
                                            "text": "The word <i>naledi</i> means ‘star’ in the Sotho language and refers to the Dinaledi Chamber's location within the Rising Star cave system."
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            "type": "table",
                            "doi": "10.7554/eLife.09560.013",
                            "id": "tbl2",
                            "label": "Table 2",
                            "title": "Dental measures for <i>H. naledi</i> and comparative hominin species",
                            "tables": [
                                "<table><thead><tr><th colspan=\"18\">Maxillary</th></tr><tr><th/><th/><th colspan=\"2\">I<sup>1</sup></th><th colspan=\"2\">I<sup>2</sup></th><th colspan=\"2\">C</th><th colspan=\"2\">P<sup>3</sup></th><th colspan=\"2\">P<sup>4</sup></th><th colspan=\"2\">M<sup>1</sup></th><th colspan=\"2\">M<sup>2</sup></th><th colspan=\"2\">M<sup>3</sup></th></tr><tr><th/><th/><th>MD</th><th>LL</th><th>MD</th><th>LL</th><th>MD</th><th>LL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th></tr></thead><tbody><tr><td rowspan=\"3\"><italic>Au. anamensis</italic></td><td>n</td><td>3</td><td>5</td><td>–</td><td>2</td><td>6</td><td>7</td><td>7</td><td>6</td><td>5</td><td>3</td><td>12</td><td>10</td><td>10</td><td>8</td><td>9</td><td>8</td></tr><tr><td>mean</td><td>10.8</td><td>8.7</td><td>–</td><td>7.3</td><td>11.0</td><td>10.6</td><td>9.9</td><td>12.6</td><td>8.9</td><td>13.6</td><td>11.5</td><td>12.9</td><td>13.0</td><td>14.4</td><td>12.5</td><td>14.2</td></tr><tr><td>range</td><td>9.1–12.4</td><td>8.2–9.3</td><td>–</td><td>7.0–7.5</td><td>9.9–12.3</td><td>9.1–11.8</td><td>8.2–11.8</td><td>10.1–14.3</td><td>7.2–12.1</td><td>12.6–14.2</td><td>7.8–14.3</td><td>9.0–16.7</td><td>10.9–16.3</td><td>12.9–16.1</td><td>11.1–15.7</td><td>13.0–15.7</td></tr><tr><td rowspan=\"3\"><italic>Au. afarensis</italic></td><td>n</td><td>7</td><td>8</td><td>9</td><td>9</td><td>15</td><td>15</td><td>12</td><td>10</td><td>18</td><td>12</td><td>16</td><td>13</td><td>10</td><td>11</td><td>11</td><td>11</td></tr><tr><td>mean</td><td>10.7</td><td>8.4</td><td>7.5</td><td>7.2</td><td>9.9</td><td>10.8</td><td>8.8</td><td>12.4</td><td>9.1</td><td>12.4</td><td>12.0</td><td>13.4</td><td>12.9</td><td>14.6</td><td>12.7</td><td>14.5</td></tr><tr><td>range</td><td>9.9–11.8</td><td>7.1–9.7</td><td>6.6–8.2</td><td>6.2–8.1</td><td>8.8–11.6</td><td>9.3–12.5</td><td>7.7–9.7</td><td>11.3–13.4</td><td>7.6–10.8</td><td>11.1–14.5</td><td>10.5–13.8</td><td>12.0–15.0</td><td>12.1–13.6</td><td>13.4–15.2</td><td>10.9–14.8</td><td>13.1–16.3</td></tr><tr><td rowspan=\"3\"><italic>Au. africanus</italic></td><td>n</td><td>15</td><td>15</td><td>11</td><td>10</td><td>16</td><td>13</td><td>26</td><td>25</td><td>20</td><td>20</td><td>21</td><td>20</td><td>23</td><td>24</td><td>27</td><td>28</td></tr><tr><td>mean</td><td>10.7</td><td>8.3</td><td>6.9</td><td>6.8</td><td>9.9</td><td>10.3</td><td>9.2</td><td>12.7</td><td>9.5</td><td>13.4</td><td>12.9</td><td>13.9</td><td>14.1</td><td>15.7</td><td>14.2</td><td>16.0</td></tr><tr><td>range</td><td>9.4–12.5</td><td>7.4–9.1</td><td>5.8–8.0</td><td>5.6–7.9</td><td>8.8–11.0</td><td>8.7–12.0</td><td>8.5–10.2</td><td>10.7–14.5</td><td>7.2–11.0</td><td>12.4–15.3</td><td>11.7–14.4</td><td>12.9–15.3</td><td>12.1–16.3</td><td>12.8–17.9</td><td>11.2–16.9</td><td>13.1–18.6</td></tr><tr><td rowspan=\"3\"><italic>Au. sediba</italic></td><td>n</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>2</td><td>2</td></tr><tr><td>mean</td><td>10.1</td><td>6.9</td><td>7.2</td><td>6.6</td><td>9.0</td><td>8.8</td><td>9.0</td><td>11.2</td><td>9.3</td><td>12.1</td><td>12.9</td><td>12.0</td><td>12.9</td><td>13.7</td><td>13.0</td><td>13.5</td></tr><tr><td>range</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>12.6–13.3</td><td>12.9–14.1</td></tr><tr><td rowspan=\"3\"><italic>H. naledi</italic></td><td>n</td><td>–</td><td>5</td><td>4</td><td>8</td><td>10</td><td>9</td><td>10</td><td>10</td><td>7</td><td>7</td><td>12</td><td>13</td><td>11</td><td>9</td><td>7</td><td>7</td></tr><tr><td>mean</td><td>9.4</td><td>6.5</td><td>6.6</td><td>6.2</td><td>8.1</td><td>8.6</td><td>8.0</td><td>10.5</td><td>8.1</td><td>11.0</td><td>11.6</td><td>11.7</td><td>12.2</td><td>12.8</td><td>11.6</td><td>12.4</td></tr><tr><td>range</td><td>8.8–9.8</td><td>6.3–7.0</td><td>6.3–7.0</td><td>5.8–6.6</td><td>7.3–8.9</td><td>8.0–9.6</td><td>7.7–8.4</td><td>9.8–11.0</td><td>7.7–8.7</td><td>10.5–11.2</td><td>10.5–12.4</td><td>11.2–12.4</td><td>11.0–13.0</td><td>11.9–13.6</td><td>11.0–12.7</td><td>11.4–13.4</td></tr><tr><td rowspan=\"3\"><italic>H. habilis</italic></td><td>n</td><td>2</td><td>2</td><td>4</td><td>4</td><td>2</td><td>3</td><td>7</td><td>7</td><td>8</td><td>8</td><td>13</td><td>13</td><td>7</td><td>7</td><td>7</td><td>7</td></tr><tr><td>mean</td><td>10.6</td><td>8.0</td><td>7.4</td><td>6.6</td><td>9.0</td><td>9.8</td><td>9.0</td><td>11.9</td><td>9.2</td><td>12.1</td><td>12.7</td><td>13.0</td><td>12.7</td><td>14.3</td><td>12.3</td><td>14.7</td></tr><tr><td>range</td><td>10.1–11.1</td><td>7.3–8.7</td><td>6.7–8.1</td><td>6.0–7.9</td><td>8.5–9.4</td><td>8.5–11.6</td><td>8.1–9.6</td><td>11.0–12.7</td><td>8.5–9.9</td><td>11.0–13.1</td><td>11.6–13.9</td><td>12.1–14.1</td><td>11.8–13.5</td><td>13.5–16.2</td><td>11.3–13.9</td><td>13.2–16.6</td></tr><tr><td rowspan=\"3\"><italic>H. rudolfensis</italic></td><td>n</td><td>1</td><td>1</td><td>–</td><td>–</td><td>1</td><td>1</td><td>1</td><td>1</td><td>2</td><td>2</td><td>2</td><td>2</td><td>2</td><td>2</td><td>1</td><td>1</td></tr><tr><td>mean</td><td>12.3</td><td>7.7</td><td>–</td><td>–</td><td>11.5</td><td>12.5</td><td>10.5</td><td>13.6</td><td>10.2</td><td>12.5</td><td>14.0</td><td>14.0</td><td>14.3</td><td>15.8</td><td>13.3</td><td>13.5</td></tr><tr><td>range</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>9.7–10.7</td><td>11.1–13.8</td><td>13.9–14.2</td><td>13.3–14.8</td><td>14.1–14.6</td><td>14.1–17.6</td><td>–</td><td>–</td></tr><tr><td rowspan=\"3\"><italic>H. erectus</italic></td><td>n</td><td>11</td><td>12</td><td>6</td><td>6</td><td>12</td><td>12</td><td>27</td><td>27</td><td>30</td><td>29</td><td>34</td><td>32</td><td>22</td><td>22</td><td>16</td><td>16</td></tr><tr><td>mean</td><td>10.3</td><td>8.1</td><td>7.7</td><td>8.0</td><td>9.5</td><td>10.0</td><td>8.5</td><td>11.8</td><td>8.1</td><td>11.6</td><td>12.2</td><td>13.2</td><td>12.0</td><td>13.3</td><td>10.5</td><td>12.8</td></tr><tr><td>range</td><td>8.1–12.6</td><td>7.0–11.7</td><td>6.0–8.3</td><td>6.9–8.5</td><td>8.5–11.1</td><td>9.0–11.8</td><td>7.1–10.1</td><td>9.5–13.8</td><td>7.0–9.4</td><td>9.9–13.4</td><td>10.1–14.6</td><td>11.0–15.9</td><td>10.3–13.6</td><td>10.9–15.5</td><td>8.7–14.7</td><td>10.4–15.8</td></tr><tr><td rowspan=\"3\"><italic>H. neanderthalensis</italic></td><td>n</td><td>28</td><td>37</td><td>35</td><td>41</td><td>28</td><td>29</td><td>16</td><td>17</td><td>21</td><td>19</td><td>23</td><td>24</td><td>27</td><td>28</td><td>22</td><td>21</td></tr><tr><td>mean</td><td>9.7</td><td>8.5</td><td>8.0</td><td>8.4</td><td>8.8</td><td>10.1</td><td>8.0</td><td>10.6</td><td>7.8</td><td>10.6</td><td>11.6</td><td>12.3</td><td>10.9</td><td>12.5</td><td>9.9</td><td>12.3</td></tr><tr><td>range</td><td>8.2–11.8</td><td>7.3–9.9</td><td>5.8–9.3</td><td>5.8–9.9</td><td>7.2–10.0</td><td>7.6–11.4</td><td>6.6–9.3</td><td>8.4–11.8</td><td>5.9–11.5</td><td>8.3–11.7</td><td>9.5–13.5</td><td>11.0–14.2</td><td>8.9–15.9</td><td>10.8–14.6</td><td>8.2–11.4</td><td>9.8–14.6</td></tr><tr><td rowspan=\"3\"><italic>H. heidelbergensis</italic></td><td>n</td><td>21</td><td>23</td><td>19</td><td>21</td><td>27</td><td>29</td><td>25</td><td>25</td><td>22</td><td>23</td><td>25</td><td>24</td><td>24</td><td>23</td><td>26</td><td>27</td></tr><tr><td>mean</td><td>9.6</td><td>7.8</td><td>7.7</td><td>7.8</td><td>8.8</td><td>9.8</td><td>7.9</td><td>10.6</td><td>7.6</td><td>10.3</td><td>11.2</td><td>11.9</td><td>10.2</td><td>12.3</td><td>8.9</td><td>11.6</td></tr><tr><td>range</td><td>8.7–10.7</td><td>7.1–9.9</td><td>7.2–8.4</td><td>7.3–8.6</td><td>8.1–11.0</td><td>8.8–11.8</td><td>7.1–9.0</td><td>9.2–12.2</td><td>7.0–8.8</td><td>9.1–11.5</td><td>9.9–12.3</td><td>10.3–13.2</td><td>8.1–12.1</td><td>11.1–13.8</td><td>7.6–11.0</td><td>10.0–13.2</td></tr><tr><td rowspan=\"3\">MP/LP African Homo</td><td>n</td><td>6</td><td>6</td><td>7</td><td>8</td><td>4</td><td>4</td><td>6</td><td>6</td><td>10</td><td>10</td><td>14</td><td>14</td><td>20</td><td>20</td><td>9</td><td>9</td></tr><tr><td>mean</td><td>9.0</td><td>7.8</td><td>7.4</td><td>7.2</td><td>8.9</td><td>9.7</td><td>8.4</td><td>10.8</td><td>8.1</td><td>10.8</td><td>12.3</td><td>13.2</td><td>11.0</td><td>12.9</td><td>9.2</td><td>11.7</td></tr><tr><td>range</td><td>6.3–10.9</td><td>6.6–8.7</td><td>6.0–9.3</td><td>6.1–8.5</td><td>8.2–9.5</td><td>8.8–10.0</td><td>8.1–8.7</td><td>9.9–11.8</td><td>7.5–9.3</td><td>9.4–12.8</td><td>10.4–14.0</td><td>12.0–15.0</td><td>7.8–13.0</td><td>11.0–15.0</td><td>7.6–10.2</td><td>10.0–13.2</td></tr></tbody></table>",
                                "<table><thead><tr><th colspan=\"18\">Mandibular</th></tr><tr><th/><th/><th colspan=\"2\">I<sub>1</sub></th><th colspan=\"2\">I<sub>2</sub></th><th colspan=\"2\">C</th><th colspan=\"2\">P<sub>3</sub></th><th colspan=\"2\">P<sub>4</sub></th><th colspan=\"2\">M<sub>1</sub></th><th colspan=\"2\">M<sub>2</sub></th><th colspan=\"2\">M<sub>3</sub></th></tr><tr><th/><th/><th>MD</th><th>LL</th><th>MD</th><th>LL</th><th>MD</th><th>LL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th><th>MD</th><th>BL</th></tr></thead><tbody><tr><td rowspan=\"3\"><italic>Au. anamensis</italic></td><td>n</td><td>2</td><td>1</td><td>4</td><td>3</td><td>7</td><td>7</td><td>8</td><td>8</td><td>8</td><td>8</td><td>9</td><td>10</td><td>7</td><td>7</td><td>8</td><td>8</td></tr><tr><td>mean</td><td>6.9</td><td>7.4</td><td>7.8</td><td>8.3</td><td>10.0</td><td>10.4</td><td>12.4</td><td>9.2</td><td>9.1</td><td>11.3</td><td>12.9</td><td>12.3</td><td>14.0</td><td>13.4</td><td>15.3</td><td>13.4</td></tr><tr><td>range</td><td>6.8–6.9</td><td>–</td><td>6.6–8.7</td><td>7.9–8.6</td><td>6.6–13.9</td><td>9.2–11.4</td><td>11.3–13.4</td><td>8.6–10.0</td><td>7.4–9.8</td><td>9.6–13.2</td><td>11.6–13.8</td><td>10.2–14.8</td><td>13.0–15.9</td><td>12.3–14.9</td><td>13.7–17.0</td><td>12.1–15.2</td></tr><tr><td rowspan=\"3\"><italic>Au. afarensis</italic></td><td>n</td><td>7</td><td>8</td><td>7</td><td>6</td><td>13</td><td>16</td><td>27</td><td>26</td><td>24</td><td>21</td><td>32</td><td>26</td><td>31</td><td>27</td><td>26</td><td>23</td></tr><tr><td>mean</td><td>6.7</td><td>7.1</td><td>6.7</td><td>8.0</td><td>8.8</td><td>10.4</td><td>9.6</td><td>10.6</td><td>9.8</td><td>11.0</td><td>13.1</td><td>12.6</td><td>14.3</td><td>13.4</td><td>15.3</td><td>13.5</td></tr><tr><td>range</td><td>5.6–7.7</td><td>5.6–8.0</td><td>5.0–8.0</td><td>6.7–8.8</td><td>7.5–11.7</td><td>8.0–12.4</td><td>7.9–12.6</td><td>8.9–13.8</td><td>7.7–11.4</td><td>9.8–12.8</td><td>10.1–14.8</td><td>11.0–14.0</td><td>12.1–16.5</td><td>11.1–15.2</td><td>13.4–18.1</td><td>11.3–15.3</td></tr><tr><td rowspan=\"3\"><italic>Au. africanus</italic></td><td>n</td><td>11</td><td>12</td><td>12</td><td>13</td><td>23</td><td>25</td><td>20</td><td>21</td><td>25</td><td>23</td><td>29</td><td>32</td><td>38</td><td>38</td><td>34</td><td>35</td></tr><tr><td>mean</td><td>6.2</td><td>6.7</td><td>7.2</td><td>7.9</td><td>9.4</td><td>10.1</td><td>9.7</td><td>11.5</td><td>10.4</td><td>11.6</td><td>14.0</td><td>13.0</td><td>15.7</td><td>14.5</td><td>16.3</td><td>14.6</td></tr><tr><td>range</td><td>4.8–6.9</td><td>5.7–7.9</td><td>5.6–8.1</td><td>6.6–9.2</td><td>8.5–10.7</td><td>8.2–12.1</td><td>8.8–11.0</td><td>9.9–13.9</td><td>8.7–12.3</td><td>9.3–13.2</td><td>12.4–15.8</td><td>11.2–15.1</td><td>14.2–17.7</td><td>12.8–16.8</td><td>13.5–18.5</td><td>12.2–16.8</td></tr><tr><td rowspan=\"3\"><italic>Au. sediba</italic></td><td>n</td><td>–</td><td>1</td><td>–</td><td>1</td><td>2</td><td>2</td><td>1</td><td>1</td><td>1</td><td>1</td><td>2</td><td>2</td><td>2</td><td>2</td><td>2</td><td>2</td></tr><tr><td>mean</td><td>–</td><td>5.9</td><td>–</td><td>6.6</td><td>7.7</td><td>8.0</td><td>8.1</td><td>9.2</td><td>8.8</td><td>9.7</td><td>13.1</td><td>11.4</td><td>14.5</td><td>12.8</td><td>14.9</td><td>13.2</td></tr><tr><td>range</td><td>–</td><td>–</td><td>–</td><td>–</td><td>7.3–8.0</td><td>7.4–8.6</td><td>–</td><td>–</td><td>–</td><td>–</td><td>13.1–13.1</td><td>11.3–11.5</td><td>14.4–14.5</td><td>12.3–13.2</td><td>14.9–14.9</td><td>12.5–13.6</td></tr><tr><td rowspan=\"3\"><italic>H. naledi</italic></td><td>n</td><td>7</td><td>7</td><td>5</td><td>6</td><td>7</td><td>7</td><td>9</td><td>10</td><td>6</td><td>6</td><td>11</td><td>11</td><td>9</td><td>9</td><td>6</td><td>5</td></tr><tr><td>mean</td><td>6.1</td><td>5.4</td><td>6.9</td><td>5.9</td><td>7.1</td><td>7.1</td><td>9.0</td><td>8.8</td><td>8.7</td><td>9.1</td><td>12.2</td><td>10.7</td><td>13.3</td><td>11.2</td><td>13.4</td><td>12.1</td></tr><tr><td>range</td><td>5.7–7.0</td><td>5.3–5.9</td><td>6.6–7.4</td><td>5.9–6.0</td><td>6.4–7.5</td><td>6.9–7.4</td><td>8.2–9.4</td><td>8.2–9.7</td><td>8.3–9.0</td><td>8.5–10.2</td><td>11.3–12.7</td><td>10.3–11.4</td><td>12.3–14.0</td><td>10.7–12.2</td><td>12.9–13.7</td><td>11.7–12.8</td></tr><tr><td rowspan=\"3\"><italic>H. habilis</italic></td><td>n</td><td>2</td><td>2</td><td>2</td><td>2</td><td>3</td><td>2</td><td>4</td><td>4</td><td>3</td><td>3</td><td>5</td><td>5</td><td>4</td><td>4</td><td>4</td><td>4</td></tr><tr><td>mean</td><td>6.4</td><td>6.8</td><td>7.4</td><td>7.6</td><td>8.7</td><td>9.0</td><td>9.6</td><td>9.6</td><td>9.9</td><td>10.5</td><td>13.7</td><td>11.9</td><td>15.0</td><td>13.5</td><td>15.4</td><td>13.3</td></tr><tr><td>range</td><td>6.4–6.5</td><td>6.7–7.0</td><td>7.2–7.7</td><td>7.6–7.6</td><td>7.6–9.6</td><td>7.9–10.0</td><td>9.0–10.6</td><td>8.6–11.1</td><td>9.0–10.5</td><td>9.9–11.0</td><td>13.0–14.8</td><td>10.9–12.8</td><td>14.2–15.7</td><td>12.0–15.1</td><td>14.8–15.9</td><td>12.4–14.4</td></tr><tr><td rowspan=\"3\"><italic>H. rudolfensis</italic></td><td>n</td><td>–</td><td>1</td><td>–</td><td>1</td><td>–</td><td>1</td><td>3</td><td>3</td><td>6</td><td>6</td><td>5</td><td>5</td><td>6</td><td>5</td><td>3</td><td>3</td></tr><tr><td>mean</td><td>–</td><td>5.4</td><td>–</td><td>6.7</td><td>–</td><td>8.3</td><td>9.9</td><td>11.1</td><td>10.1</td><td>11.4</td><td>14.0</td><td>12.7</td><td>16.0</td><td>13.7</td><td>16.4</td><td>14.1</td></tr><tr><td>range</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>–</td><td>9.0–10.7</td><td>9.5–12.3</td><td>8.8–11.8</td><td>9.8–12.2</td><td>12.8–15.2</td><td>11.4–13.2</td><td>14.0–18.3</td><td>12.7–14.9</td><td>15.6–17.0</td><td>13.1–14.6</td></tr><tr><td rowspan=\"3\"><italic>H. erectus</italic></td><td>n</td><td>11</td><td>12</td><td>14</td><td>16</td><td>14</td><td>16</td><td>30</td><td>30</td><td>25</td><td>26</td><td>43</td><td>43</td><td>41</td><td>40</td><td>26</td><td>27</td></tr><tr><td>mean</td><td>6.2</td><td>6.4</td><td>7</td><td>7.2</td><td>8.7</td><td>9</td><td>9</td><td>10.1</td><td>8.7</td><td>10.1</td><td>12.7</td><td>11.9</td><td>13.3</td><td>12.5</td><td>12.7</td><td>11.7</td></tr><tr><td>range</td><td>4.8–7.4</td><td>5.8–7.1</td><td>5.3–8.1</td><td>6.4–8.5</td><td>7.0–10.3</td><td>8.0–10.4</td><td>7.0–12.0</td><td>8.2–12.0</td><td>7.2–10.3</td><td>8.0–12.5</td><td>9.9–14.8</td><td>10.1–13.3</td><td>11.3–15.3</td><td>10.8–14.3</td><td>10.0–15.2</td><td>10.0–14.2</td></tr><tr><td rowspan=\"3\"><italic>H. neanderthalensis</italic></td><td>n</td><td>9</td><td>16</td><td>23</td><td>31</td><td>36</td><td>41</td><td>20</td><td>21</td><td>23</td><td>25</td><td>38</td><td>40</td><td>26</td><td>27</td><td>18</td><td>20</td></tr><tr><td>mean</td><td>5.6</td><td>7.2</td><td>6.8</td><td>7.8</td><td>7.8</td><td>8.8</td><td>7.9</td><td>9.1</td><td>7.8</td><td>9.4</td><td>11.8</td><td>11.1</td><td>12.1</td><td>11.3</td><td>12.0</td><td>11.0</td></tr><tr><td>range</td><td>4.2–6.4</td><td>5.2–8.8</td><td>5.9–7.5</td><td>6.8–9.0</td><td>6.7–8.8</td><td>6.8–10.3</td><td>6.6–9.1</td><td>8.0–10.3</td><td>6.5–9.4</td><td>8.5–10.5</td><td>10.1–13.6</td><td>10.2–12.9</td><td>9.3–14.0</td><td>8.8–12.4</td><td>11.2–13.9</td><td>9.9–12.2</td></tr><tr><td rowspan=\"3\"><italic>H. heidelbergensis</italic></td><td>n</td><td>21</td><td>22</td><td>19</td><td>20</td><td>23</td><td>24</td><td>22</td><td>22</td><td>26</td><td>26</td><td>29</td><td>29</td><td>29</td><td>29</td><td>32</td><td>32</td></tr><tr><td>mean</td><td>5.6</td><td>6.7</td><td>6.5</td><td>7.3</td><td>7.6</td><td>8.7</td><td>7.9</td><td>8.9</td><td>7.2</td><td>8.7</td><td>11.3</td><td>10.6</td><td>11.2</td><td>10.5</td><td>11.5</td><td>10.0</td></tr><tr><td>range</td><td>4.8–6.5</td><td>6.0–7.5</td><td>6.0–7.2</td><td>6.6–8.0</td><td>6.9–9.0</td><td>7.3–10.0</td><td>7.2–9.0</td><td>7.6–11.6</td><td>6.6–8.8</td><td>7.2–11.7</td><td>10.4–13.8</td><td>9.6–13.0</td><td>9.7–14.6</td><td>8.5–13.9</td><td>9.7–13.2</td><td>8.6–12.5</td></tr><tr><td rowspan=\"3\">MP/LP African Homo</td><td>n</td><td>5</td><td>5</td><td>8</td><td>8</td><td>8</td><td>8</td><td>8</td><td>8</td><td>12</td><td>9</td><td>16</td><td>16</td><td>20</td><td>20</td><td>13</td><td>13</td></tr><tr><td>mean</td><td>6.0</td><td>6.8</td><td>6.8</td><td>7.2</td><td>8.8</td><td>9.6</td><td>8.6</td><td>9.8</td><td>8.6</td><td>10.3</td><td>13.1</td><td>11.8</td><td>12.5</td><td>11.7</td><td>12.4</td><td>11.5</td></tr><tr><td>range</td><td>5.7–6.4</td><td>6.1–7.2</td><td>5.6–8.3</td><td>6.4–8.0</td><td>7.8–10.0</td><td>8.8–10.3</td><td>7.7–9.0</td><td>8.6–11.2</td><td>6.9–9.6</td><td>9.3–11.4</td><td>10.7–14.2</td><td>10.0–13.0</td><td>10.8–15.0</td><td>9.2–13.6</td><td>10.6–13.5</td><td>9.9–12.7</td></tr></tbody></table>"
                            ],
                            "footer": [
                                {
                                    "type": "paragraph",
                                    "text": "MP, Middle Pleistocene and LP, Late Pleistocene."
                                }
                            ]
                        }
                    ]
                },
                {
                    "type": "section",
                    "title": "Differential diagnosis",
                    "content": [
                        {
                            "type": "paragraph",
                            "text": "This comprehensive differential diagnosis is based upon cranial, dental and postcranial characters. The hypodigms used for other species are detailed in the ‘Materials and methods’. We examined original specimens for most species, except where indicated in the ‘Materials and methods’; when we relied on other sources for anatomical observations we indicate this. A summary of traits of <i>H. naledi</i> in comparison to other species is presented in Supplementary file 2. Comparative cranial and mandibular measures are presented in Table 1, and comparative dental measures are provided in Table 2."
                        },
                        {
                            "type": "mathml",
                            "id": "eqn7",
                            "label": "[7]",
                            "mathml": "<math><mrow><msub><mtext>e</mtext><mn>0</mn></msub><mo>=</mo><mfrac><mrow><msub><mtext>e</mtext><mrow><mn>0</mn><mo>,</mo><mtext>max</mtext></mrow></msub><mo>×</mo><mtext>GDP</mtext></mrow><mrow><mtext>GDP</mtext><mo>+</mo><msub><mtext>K</mtext><mrow><mtext>inc</mtext></mrow></msub></mrow></mfrac><mo>,</mo></mrow></math>"
                        },
                        {
                            "type": "video",
                            "doi": "10.7554/eLife.00569.019",
                            "id": "media1",
                            "label": "Video 1",
                            "title": "<i>B. schlosseri</i> blood circulation",
                            "caption": [
                                {
                                    "type": "paragraph",
                                    "text": "(<b>A)</b> Time-lapse acquisition of blood flow in the blood vessels (bv) and ampullae of a chimeric <em>B. schlosseri</em> colony, generated from a fusion between a mother and its offspring (fused). (<b>B</b>) Ampullae contract, buds develop, and a colony gets ready to replace the old generation. (<b>C</b>) Old generation zooids are getting resorbed (res. z) and replaced by the new generation (buds). (<b>D</b>) A heart beating and pumping blood in the primary bud of a different colony. (<b>E</b>) Blood flow through a common blood vessel between two allogeneic/compatible colonies, creating a natural chimera."
                                }
                            ],
                            "sources": [
                                {
                                    "mediaType": "video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"",
                                    "uri": "https://static-movie-usa.glencoesoftware.com/mp4/10.7554/659/0f10378e095dde7aaf579af504c4bfdc6fb86550/elife-00569-media1.mp4"
                                },
                                {
                                    "mediaType": "video/webm; codecs=\"vp8.0, vorbis\"",
                                    "uri": "https://static-movie-usa.glencoesoftware.com/webm/10.7554/659/0f10378e095dde7aaf579af504c4bfdc6fb86550/elife-00569-media1.webm"
                                },
                                {
                                    "mediaType": "video/ogg; codecs=\"theora, vorbis\"",
                                    "uri": "https://static-movie-usa.glencoesoftware.com/ogv/10.7554/659/0f10378e095dde7aaf579af504c4bfdc6fb86550/elife-00569-media1.ogv"
                                }
                            ],
                            "image": "https://static-movie-usa.glencoesoftware.com/jpg/10.7554/659/0f10378e095dde7aaf579af504c4bfdc6fb86550/elife-00569-media1.jpg",
                            "width": 640,
                            "height": 480
                        }
                    ]
                }
            ],
            "decisionLetter": {
                "doi": "10.7554/eLife.09560.030",
                "description": [
                    {
                        "type": "paragraph",
                        "text": "eLife posts the editorial decision letter and author response on a selection of the published articles (subject to the approval of the authors). An edited version of the letter sent to the authors after peer review is shown, indicating the substantive concerns or comments; minor concerns are not usually shown. Reviewers have the opportunity to discuss the decision before the letter is sent. Similarly, the author response typically shows only responses to the major concerns raised by the reviewers."
                    }
                ],
                "content": [
                    {
                        "type": "paragraph",
                        "text": "Thank you for submitting your work entitled “A new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa” for peer review at <i>eLife</i>."
                    },
                    {
                        "type": "box",
                        "title": "Box 2",
                        "content": [
                            {
                                "type": "paragraph",
                                "text": "Your submission has been favorably evaluated by Ian Baldwin (Senior editor), two guest Reviewing editors (Johannes Krause and Nicholas Conard), and two peer reviewers. One of the two peer reviewers, Chris Stringer, has agreed to share his identity, and Johannes Krause has drafted this decision to help you prepare a revised submission."
                            }
                        ]
                    },
                    {
                        "type": "paragraph",
                        "text": "The authors describe a large collection of recently discovered hominin fossils from the Dinaledi Chamber in the Rising Star cave system in South Africa. Based on their initial assessment they argue that the fossil remains derive from a single homogenous hominin group and present a new taxon that they call <i>Homo naledi</i>."
                    }
                ]
            },
            "authorResponse": {
                "doi": "10.7554/eLife.09560.031",
                "content": [
                    {
                        "type": "paragraph",
                        "text": "We have added <i>H. floresiensis</i> to the differential diagnosis, including relevant aspects of cranial, dental, hand, lower limb and foot anatomy. We have also added <i>H. floresiensis</i> to both relevant figures (Figure 5 and Figure 7). We have also made a short comment on the validity of <i>H. gautengensis</i> in the Materials and methods."
                    },
                    {
                        "type": "paragraph",
                        "text": "We have removed both initial and final paragraphs in their entirety as suggested, and have slightly altered the remaining (second and penultimate) paragraphs to introduce and conclude the paper."
                    },
                    {
                        "type": "mathml",
                        "mathml": "<math><mrow><msub><mi>h</mi><mi>i</mi></msub><mo>=</mo><mi>f</mi><mrow><mo>(</mo><mrow><msub><mi>y</mi><mi>i</mi></msub></mrow><mo>)</mo></mrow><mo>;</mo><mo> </mo><mtext>where</mtext><mo> </mo><mi>f</mi><mo>′</mo><mo>&gt;</mo><mn>0</mn><mo> </mo><mtext>and</mtext><mo> </mo><mi>f</mi><mo>″</mo><mo>&lt;</mo><mn>0</mn><mo>,</mo></mrow></math>"
                    }
                ]
            }
        }

JSON;

        $complete_expected = <<<'JSON'
        {
            "status": "vor",
            "id": "09560",
            "version": 1,
            "type": "research-article",
            "doi": "10.7554/eLife.09560",
            "title": "<i>Homo naledi</i>, a new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa",
            "published": "2015-09-10T00:00:00+00:00",
            "volume": 4,
            "issue": 3,
            "elocationId": "e09560",
            "pdf": "https://elifesciences.org/content/4/e09560.pdf",
            "subjects": [
                "genomics-evolutionary-biology"
            ],
            "impactStatement": "A new hominin species has been unearthed in the Dinaledi Chamber of the Rising Star cave system in the largest assemblage of a single species of hominins yet discovered in Africa.",
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
JSON;

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