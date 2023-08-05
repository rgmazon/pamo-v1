<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script type="text/javascript" src="/js/lib/dummy.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.bootstrap.min.css">

    <style id="compiled-css" type="text/css">
        /* EOS */
        .btn-default {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 2px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .buttons-excel {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button-excel:hover {
            background-color: #4CAF50;
            color: white;
        }

        .buttons-pdf {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
        }

        .buttons-pdf:hover {
            background-color: #008CBA;
            color: white;
        }
    </style>

    <script id="insert"></script>

    <script src="/js/stringify.js?64f3b9db34dc5ac87ceafd7b0b9bfa5141166ea1" charset="utf-8"></script>
    <script>
        const customConsole = (w) => {
            const pushToConsole = (payload, type) => {
                w.parent.postMessage({
                    console: {
                        payload: stringify(payload),
                        type: type
                    }
                }, "*")
            }

            w.onerror = (message, url, line, column) => {
                // the line needs to correspond with the editor panel
                // unfortunately this number needs to be altered every time this view is changed
                line = line - 70
                if (line < 0) {
                    pushToConsole(message, "error")
                } else {
                    pushToConsole(`[${line}:${column}] ${message}`, "error")
                }
            }

            let console = (function(systemConsole) {
                return {
                    log: function() {
                        let args = Array.from(arguments)
                        pushToConsole(args, "log")
                        systemConsole.log.apply(this, args)
                    },
                    info: function() {
                        let args = Array.from(arguments)
                        pushToConsole(args, "info")
                        systemConsole.info.apply(this, args)
                    },
                    warn: function() {
                        let args = Array.from(arguments)
                        pushToConsole(args, "warn")
                        systemConsole.warn.apply(this, args)
                    },
                    error: function() {
                        let args = Array.from(arguments)
                        pushToConsole(args, "error")
                        systemConsole.error.apply(this, args)
                    },
                    system: function(arg) {
                        pushToConsole(arg, "system")
                    },
                    clear: function() {
                        systemConsole.clear.apply(this, {})
                    },
                    time: function() {
                        let args = Array.from(arguments)
                        systemConsole.time.apply(this, args)
                    },
                    assert: function(assertion, label) {
                        if (!assertion) {
                            pushToConsole(label, "log")
                        }

                        let args = Array.from(arguments)
                        systemConsole.assert.apply(this, args)
                    }
                }
            }(window.console))

            window.console = {
                ...window.console,
                ...console
            }

            console.system("Running fiddle")
        }

        if (window.parent) {
            customConsole(window)
        }
    </script>
</head>

<body>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th colspan='4'>User</th>
                <th>Start </th>
                <th>Basic</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th> date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>

            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>

        </tbody>
    </table>

    <script type="text/javascript">
        //<![CDATA[


        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });


        //]]>
    </script>

    <script>
        // tell the embed parent frame the height of the content
        if (window.parent && window.parent.parent) {
            window.parent.parent.postMessage(["resultsFrame", {
                height: document.body.getBoundingClientRect().height,
                slug: "zm825k01"
            }], "*")
        }

        // always overwrite window.name, in case users try to set it manually
        window.name = "result"
    </script>

    <script>
        let allLines = []

        window.addEventListener("message", (message) => {
            if (message.data.console) {
                let insert = document.querySelector("#insert")
                allLines.push(message.data.console.payload)
                insert.innerHTML = allLines.join(";\r")

                let result = eval.call(null, message.data.console.payload)
                if (result !== undefined) {
                    console.log(result)
                }
            }
        })
    </script>

</body>

</html>