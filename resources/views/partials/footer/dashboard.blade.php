{{ 
    html()->element('footer')->children([
        html()->element('div')->class('container')->children([
            html()->element('div')->class('footer clearfix mb-0 text-muted')->children([
                html()->element('div')->class('float-start')->children([
                    html()->element('p')->text(date('Y').' &copy; Benjamin4k')
                ]),

                html()->element('div')->class('float-end')->children([
                    html()->element('p')->children([
                        html()->element('span')->text('Crafted with '),

                        html()->element('span')->class('text-danger')->children([
                            html()->element('i')->class('bi bi-heart')
                        ]),

                        html()->element('span')->text(' by '),
                        
                        html()->a()->href('https://github.com/Sleepy4k')->target('_blank')->text('Benjamin4k')
                    ])
                ])
            ])
        ])
    ])
}}