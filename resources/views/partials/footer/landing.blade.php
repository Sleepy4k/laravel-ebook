{{ 
    html()->element('div')->class('footer')->children([
        html()->element('div')->class('copyright')->children([
            html()->element('p')->text(date('Y').' &copy; Benjamin4k')
        ])
    ])
}}