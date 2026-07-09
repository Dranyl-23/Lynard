<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Portfolio Data Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can manage the data that populates your portfolio.
    |
    */

    'stack' => [
        'FRONTEND' => [
            'JavaScript', 'TypeScript', 'React', 'Next.js', 'Vue.js', 'Tailwind CSS',
            'SCSS', 'Styled Components', 'Vite', 'Webpack', 'ESLint', 'Prettier'
        ],
        'BACKEND' => [
            'Node.js', 'Python', 'Java', 'PHP', 'Express.js', 'NestJS', 'FastAPI',
            'Spring Boot', 'Laravel', 'PostgreSQL', 'MySQL', 'MongoDB', 'DynamoDB',
            'OAuth', 'JWT', 'LDAP', 'REST', 'GraphQL', 'gRPC', 'AWS Lambda'
        ],
        'DEVOPS & CLOUD' => [
            'AWS', 'GCP', 'Azure', 'GitHub Actions', 'Jenkins', 'GitLab CI',
            'Terraform', 'AWS CloudFormation', 'Docker', 'Kubernetes', 'Prometheus',
            'Grafana', 'Datadog'
        ],
        'AI & MACHINE LEARNING' => [
            'TensorFlow', 'PyTorch', 'LangChain', 'Transformers', 'OpenAI',
            'Anthropic', 'Mistral', 'Hugging Face', 'LlamaIndex', 'AutoGPT',
            'Claude Code', 'Codex'
        ],
        'SECURITY & IDENTITY' => [
            'AWS IAM', 'Azure AD', 'Okta', 'SAP CDC', 'Auth0', 'Cognito',
            'AES', 'RSA', 'SHA', 'GDPR', 'SOC 2', 'ISO 27001'
        ],
        'CMS & NO-CODE' => [
            'WordPress', 'Strapi', 'Bubble', 'Webflow', 'Microsoft Power Platform', 'n8n'
        ],
        'DEVELOPER TOOLS' => [
            'Git', 'GitHub', 'GitLab', 'Bitbucket', 'VS Code', 'JetBrains IntelliJ',
            'PyCharm', 'Slack', 'Discord', 'Teams', 'JIRA', 'Trello', 'ClickUp'
        ]
    ],

    'projects' => [
        'featured' => [
            [
                'title' => '4PS-Nexus',
                'description' => 'A blockchain-based disbursement system for the Philippine 4Ps program. Powered by Stellar and Soroban smart contracts to enforce transparency.',
                'image' => 'ProjectLogos/4Ps-Nexus.jpg',
                'badge' => 'GOV TECH APP',
                'badge_color' => 'emerald-500',
                'badge_svg' => '<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>',
                'tags' => 'BLOCKCHAIN &middot; TS',
                'github_url' => 'https://github.com/Dranyl-23/4PS-Nexus',
                'live_url' => '#'
            ],
            [
                'title' => 'Chainbudget',
                'description' => 'A Blockchain-Based Budget Management System for Transparent Organizational Fund Monitoring. Ensures financial integrity across departments.',
                'image' => 'ProjectLogos/Chainbudget.png',
                'badge' => 'DEFI PLATFORM',
                'badge_color' => 'blue-500',
                'badge_svg' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-1.15 2.4-1.92 0-1.28-.97-1.93-3.08-2.6-2.52-.78-3.79-2.07-3.79-3.9 0-1.83 1.34-3.1 3.12-3.48V3.1h2.67v1.79c1.55.33 2.76 1.48 2.91 3.1h-1.96c-.15-1.04-.9-1.59-2.28-1.59-1.39 0-2.32.74-2.32 1.8 0 1.25 1.25 1.77 3.29 2.45 2.46.81 3.58 2.07 3.58 4.04 0 1.91-1.35 3.16-3.22 3.4z"/>',
                'tags' => 'ENTERPRISE &middot; TS',
                'github_url' => 'https://github.com/Dranyl-23/Chainbudget',
                'live_url' => '#'
            ],
            [
                'title' => 'Report-Davao',
                'description' => 'A modern civic issue reporting platform. Empowers citizens to report, track, and resolve community problems in real-time.',
                'image' => 'ProjectLogos/ReportDavao.png',
                'badge' => 'CIVIC TECH',
                'badge_color' => 'red-500',
                'badge_svg' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>',
                'tags' => 'PUBLIC SERVICE &middot; TS',
                'github_url' => 'https://github.com/Dranyl-23/Report-Davao',
                'live_url' => '#'
            ]
        ],
        'other' => [
            [
                'title' => 'ai-assistant-workflows',
                'description' => 'Your personal AI assistant mapped to your daily work routines.',
                'tags' => 'PRODUCTIVITY &middot; TS',
                'github_url' => 'https://github.com/Dranyl-23/ai-assistant-workflows'
            ],
            [
                'title' => 'Brgy-app',
                'description' => 'Local government unit (Barangay) management and operations portal.',
                'tags' => 'WEB APP &middot; TS',
                'github_url' => 'https://github.com/Dranyl-23/Brgy-app'
            ],
            [
                'title' => 'Sleep_Optimizer',
                'description' => 'A mobile application built with Flutter for optimizing user sleep patterns.',
                'tags' => 'MOBILE APP &middot; DART',
                'github_url' => 'https://github.com/Dranyl-23/Sleep_Optimizer'
            ],
            [
                'title' => 'Lynard',
                'description' => 'This very portfolio. A sleek, minimal showcase built with Laravel and Tailwind CSS.',
                'tags' => 'PORTFOLIO &middot; BLADE',
                'github_url' => 'https://github.com/Dranyl-23/Lynard'
            ]
        ]
    ],

    'experience' => [
        [
            'company' => 'Standard Chartered',
            'logo_text' => 'SC',
            'location' => 'Makati, Manila',
            'roles' => [
                [
                    'title' => 'Lead UI Engineer',
                    'duration' => 'Jul 2023 - Present &middot; 11 mos',
                    'description' => [
                        'Led the UI architecture and modernization efforts for the inner source platform serving 2,000+ internal teams across the business.',
                        'Collaborated directly with stakeholders and backend engineers to ensure seamless integrations.'
                    ],
                    'skills' => ['TypeScript', 'React', 'Next.js']
                ]
            ]
        ],
        [
            'company' => 'Cambridge University Press & Assessment',
            'logo_text' => 'CU',
            'location' => 'Makati, Manila',
            'roles' => [
                [
                    'title' => 'UI/UX Engineer',
                    'duration' => 'Feb 2022 - Jun 2023 &middot; 1 yr 5 mos',
                    'description' => [
                        'Architected the primary UI components for global assessments taken by millions of students globally.',
                        'Built interactive and accessible exam interfaces focusing on high performance across low-end devices.'
                    ],
                    'skills' => ['Vue', 'Nuxt', 'CSS Architecture']
                ],
                [
                    'title' => 'Senior Full Stack Developer',
                    'duration' => 'Jul 2019 - Feb 2022 &middot; 2 yrs 8 mos',
                    'description' => [
                        'Led development of the core content delivery network APIs.',
                        'Designed and maintained large-scale databases for storing and retrieving student metrics.'
                    ],
                    'skills' => ['PHP', 'Laravel', 'PostgreSQL']
                ]
            ]
        ],
        [
            'company' => 'INVENTIVE',
            'logo_text' => 'IN',
            'location' => 'BGC, Taguig',
            'roles' => [
                [
                    'title' => 'Software Engineering Lead',
                    'duration' => 'Jul 2017 - Jul 2019 &middot; 2 yrs 1 mo',
                    'description' => [
                        'Led the design, development, and deployment of a multi-tenant e-commerce platform.',
                        'Mentored a team of 5 engineers and established agile development workflows.'
                    ],
                    'skills' => ['React', 'Node.js', 'AWS']
                ]
        ]
    ],

    'certifications' => [
        'awards' => [
            [
                'title' => 'FigmaFusion x Cor Jesu',
                'subtitle' => 'Concept to Interface',
                'action_text' => '&lang; VIEW CERTIFICATE &rang;',
                'modal_type' => 'image',
                'file' => '/CertificationLogo/Award %26 Cert/figma_cert.jpg',
                'image' => '/CertificationLogo/Award %26 Cert/figma_cert.jpg',
                'logos' => [
                    ['src' => '/CertificationLogo/figma logo.png', 'classes' => 'bg-gray-50 border-white p-1 z-10'],
                    ['src' => '/CertificationLogo/Corjesu.webp', 'classes' => 'bg-white border-white p-0.5 -ml-4 z-0']
                ],
                'rotation' => 'rotate-1',
                'z_index' => 'z-10'
            ],
            [
                'title' => 'OpenxAI x Davao DeFi',
                'subtitle' => 'Workshop & Competition',
                'action_text' => '&lang; VIEW CERTIFICATE &rang;',
                'modal_type' => 'image',
                'file' => '/CertificationLogo/Award %26 Cert/openAI_cert.jpg',
                'image' => '/CertificationLogo/Award %26 Cert/openAI_cert.jpg',
                'logos' => [
                    ['src' => '/CertificationLogo/openxAI.png', 'classes' => 'bg-white p-1 z-10'],
                    ['src' => '/CertificationLogo/Davao Defi.jpg', 'classes' => 'bg-gray-50 p-0 -ml-4 z-0']
                ],
                'rotation' => '-rotate-2',
                'z_index' => 'z-20'
            ],
            [
                'title' => 'Base Certificate',
                'subtitle' => 'Web3 / Blockchain',
                'action_text' => '&lang; VIEW CERTIFICATE &rang;',
                'modal_type' => 'image',
                'file' => '/CertificationLogo/Award %26 Cert/base_cert.jpg',
                'image' => '/CertificationLogo/Award %26 Cert/base_cert.jpg',
                'logos' => [
                    ['src' => '/CertificationLogo/BASEPH logo.png', 'classes' => 'bg-blue-50 p-1']
                ],
                'rotation' => 'rotate-2',
                'z_index' => 'z-30'
            ],
            [
                'title' => 'StellarX',
                'subtitle' => 'Blockchain & Crypto',
                'action_text' => '&lang; VIEW IMAGE &rang;',
                'modal_type' => 'image',
                'file' => '/CertificationLogo/StellarX People.jpg',
                'image' => '/CertificationLogo/StellarX People.jpg',
                'logos' => [
                    ['src' => '/CertificationLogo/StellarX.jpg', 'classes' => 'bg-gray-50 p-1']
                ],
                'rotation' => 'rotate-3',
                'z_index' => 'z-20'
            ]
        ],
        'networking' => [
            [
                'title' => 'Network Defense',
                'subtitle' => 'Cybersecurity',
                'action_text' => '&lang; VIEW PDF &rang;',
                'modal_type' => 'pdf',
                'file' => '/CertificationLogo/Networking Cert/Network_Defense.pdf',
                'gradient' => 'from-blue-50 to-cyan-50',
                'icon_color' => 'text-blue-500',
                'badge_color' => 'bg-blue-100 text-blue-600',
                'svg' => '<path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"></path>',
                'rotation' => '-rotate-1',
                'z_index' => 'z-10'
            ],
            [
                'title' => 'Cyber Threat Mgt.',
                'subtitle' => 'Cybersecurity',
                'action_text' => '&lang; VIEW PDF &rang;',
                'modal_type' => 'pdf',
                'file' => '/CertificationLogo/Networking Cert/Cyber_Threat_Management.pdf',
                'gradient' => 'from-red-50 to-orange-50',
                'icon_color' => 'text-red-500',
                'badge_color' => 'bg-red-100 text-red-600',
                'svg' => '<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1 6h2v5h-2V7zm0 7h2v2h-2v-2z"></path>',
                'rotation' => 'rotate-2',
                'z_index' => 'z-20'
            ],
            [
                'title' => 'Endpoint Security',
                'subtitle' => 'Cybersecurity',
                'action_text' => '&lang; VIEW PDF &rang;',
                'modal_type' => 'pdf',
                'file' => '/CertificationLogo/Networking Cert/Endpoint_Security.pdf',
                'gradient' => 'from-green-50 to-emerald-50',
                'icon_color' => 'text-green-500',
                'badge_color' => 'bg-green-100 text-green-600',
                'svg' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>',
                'rotation' => '-rotate-3',
                'z_index' => 'z-30'
            ],
            [
                'title' => 'Networking',
                'subtitle' => 'Infrastructure',
                'action_text' => '&lang; VIEW PDF &rang;',
                'modal_type' => 'pdf',
                'file' => '/CertificationLogo/Networking Cert/Networking.pdf',
                'gradient' => 'from-purple-50 to-indigo-50',
                'icon_color' => 'text-purple-500',
                'badge_color' => 'bg-purple-100 text-purple-600',
                'svg' => '<path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c2.12 0 4.07-.74 5.61-1.97l3.68 3.68 1.41-1.41-3.68-3.68C19.26 16.07 20 14.12 20 12c0-4.97-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm-1-11h2v6h-2V8zm0 8h2v2h-2v-2z"></path>',
                'rotation' => 'rotate-1',
                'z_index' => 'z-10'
            ],
            [
                'title' => 'DICT-ITU DTC',
                'subtitle' => 'Training & Seminars',
                'action_text' => '&lang; VIEW PDF &rang;',
                'modal_type' => 'pdf',
                'file' => '/CertificationLogo/Networking Cert/DICT-ITU DTC.pdf',
                'gradient' => 'from-yellow-50 to-amber-50',
                'icon_color' => 'text-yellow-600',
                'badge_color' => 'bg-yellow-100 text-yellow-600',
                'svg' => '<path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z"></path>',
                'rotation' => 'rotate-2',
                'z_index' => 'z-20'
            ]
        ]
    ]

];
